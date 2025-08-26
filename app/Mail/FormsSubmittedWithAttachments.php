<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Attachment;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Barryvdh\DomPDF\Facade\Pdf;

class FormsSubmittedWithAttachments extends Mailable
{
    use Queueable, SerializesModels;

    public $tax;
    public $other;
    public $files = [];
    public $basicInfo;
    public $deduction;
    public $income;

    public function __construct($tax, $files = [], $other = null, $basicInfo = null, $deduction = null, $income = null)
    {
        $this->tax   = $tax;
        $this->files = $files;

        $this->other      = $this->prepareData($other);
        $this->basicInfo  = $this->prepareData($basicInfo);
        $this->deduction  = $this->prepareData($deduction);
        $this->income     = $this->prepareData($income);
    }

    private function prepareData($data, $humanize = true): array
    {
        if ($data instanceof \Illuminate\Database\Eloquent\Collection) {
            $raw = $data->toArray();
        } elseif ($data instanceof \Illuminate\Database\Eloquent\Model) {
            $raw = [$data->toArray()];
        } elseif (is_array($data)) {
            $raw = $data;
        } else {
            $raw = [];
        }

        if ($humanize) {
            return array_values(array_filter(array_map(
                fn($item) => $this->cleanAndHumanize((array)$item),
                $raw
            )));
        }

        return $raw;
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Tax Forms Submitted - Tax ID #' . $this->tax->id,
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.forms_submitted',
            with: [
                'tax'        => $this->tax,
                'other'      => $this->other,
                'basicInfo'  => $this->basicInfo,
                'deduction'  => $this->deduction,
                'income'     => $this->income,
            ],
        );
    }

    public function attachments(): array
    {
        $attachments = [];

        foreach ($this->files as $file) {
            if ($file && file_exists($file)) {
                $attachments[] = Attachment::fromPath($file)->as(basename($file));
            }
        }

        $forms = [
            'OtherFormData.pdf' => ['data' => $this->other, 'view' => 'pdf.other_data'],
            'BasicInfo.pdf'     => ['data' => $this->basicInfo, 'view' => 'pdf.basic_info'],
            'Deduction.pdf'     => ['data' => $this->deduction, 'view' => 'pdf.deduction'],
            'Income.pdf'        => ['data' => $this->income, 'view' => 'pdf.income'],
        ];

        foreach ($forms as $fileName => $form) {
            if (!empty($form['data'])) {
                $pdfContent = Pdf::loadView($form['view'], ['tax' => $this->tax, strtolower(pathinfo($fileName, PATHINFO_FILENAME)) => $form['data']])->output();
                if (!empty($pdfContent)) {
                    $attachments[] = Attachment::fromData(fn() => $pdfContent, $fileName)->withMime('application/pdf');
                }
            }
        }

        return $attachments;
    }

    private array $hiddenKeys = ['id', 'created_at', 'updated_at'];

    private function cleanAndHumanize(array $data): array
    {
        $out = [];

        foreach ($data as $key => $value) {
            if (in_array(strtolower($key), $this->hiddenKeys, true)) {
                continue;
            }

            if (is_null($value) || $value === '' || (is_array($value) && empty($value))) {
                continue;
            }

            $label = ucwords(preg_replace('/[_\-]+/', ' ', (string)$key));

            if (is_array($value)) {
                $nested = $this->cleanAndHumanize($value);
                if (!empty($nested)) {
                    $out[$label] = $nested;
                }
            } else {
                $out[$label] = $value;
            }
        }

        return $out;
    }
}
