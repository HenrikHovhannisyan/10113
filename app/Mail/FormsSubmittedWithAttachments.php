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
    public $otherData;
    public $files = [];

    /**
     * Constructor for the Mailable.
     *
     * @param mixed $tax
     * @param array $files
     * @param array|\Illuminate\Database\Eloquent\Model|\Illuminate\Database\Eloquent\Collection|null $other
     */
    public function __construct($tax, array $files = [], $other = null)
    {
        $this->tax = $tax;
        $this->files = $files;

        // Convert other form data to array
        if ($other instanceof \Illuminate\Database\Eloquent\Collection) {
            $raw = $other->toArray();
        } elseif ($other instanceof \Illuminate\Database\Eloquent\Model) {
            $raw = [$other->toArray()];
        } elseif (is_array($other)) {
            $raw = $other;
        } else {
            $raw = [];
        }

        // Normalize forms into proper structure
        $processed = array_map(fn($item) => $this->cleanAndHumanize((array)$item), $raw);
        $this->otherData = [
            'other'     => $processed['other'] ?? ($processed[0]['other'] ?? []),
            'basicInfo' => $processed['basicInfo'] ?? ($processed[0]['basicInfo'] ?? []),
            'deduction' => $processed['deduction'] ?? ($processed[0]['deduction'] ?? []),
            'income'    => $processed['income'] ?? ($processed[0]['income'] ?? []),
        ];
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
                'tax' => $this->tax,
                'other' => $this->otherData,
            ]
        );
    }

    public function attachments(): array
    {
        $attachments = [];

        // Direct files from $this->files
        foreach ($this->files as $file) {
            if ($file && file_exists($file)) {
                $attachments[] = Attachment::fromPath($file)->as(basename($file));
            }
        }

        // Other Form PDF
        if (!empty($this->otherData['other'])) {
            $pdf = Pdf::loadView('pdf.other_data', [
                'other' => $this->otherData['other'],
                'tax' => $this->tax
            ]);
            $attachments[] = Attachment::fromData(fn() => $pdf->output(), 'OtherForm.pdf')
                ->withMime('application/pdf');
        }

        // BasicInfoForm PDF
        if (!empty($this->otherData['basicInfo'])) {
            $pdf = Pdf::loadView('pdf.basic_info', ['form' => $this->otherData['basicInfo'][0]]);
            $attachments[] = Attachment::fromData(fn() => $pdf->output(), 'BasicInfoForm.pdf')
                ->withMime('application/pdf');
        }

        // DeductionForm PDF
        if (!empty($this->otherData['deduction'])) {
            $pdf = Pdf::loadView('pdf.deduction', ['form' => $this->otherData['deduction'][0]]);
            $attachments[] = Attachment::fromData(fn() => $pdf->output(), 'DeductionForm.pdf')
                ->withMime('application/pdf');
        }

        // IncomeForm PDF
        if (!empty($this->otherData['income'])) {
            $pdf = Pdf::loadView('pdf.income', ['form' => $this->otherData['income'][0]]);
            $attachments[] = Attachment::fromData(fn() => $pdf->output(), 'IncomeForm.pdf')
                ->withMime('application/pdf');
        }

        return $attachments;
    }

    /**
     * Keys to exclude from PDF output
     */
    private array $hiddenKeys = ['id', 'created_at', 'updated_at', 'attach'];

    /**
     * Recursively clean and format form data
     */
    private function cleanAndHumanize(array $data): array
    {
        $out = [];

        foreach ($data as $key => $value) {
            if (in_array(strtolower($key), $this->hiddenKeys, true)) continue;

            if (is_null($value) || $value === '' || (is_array($value) && empty($value))) continue;

            $label = ucwords(str_replace(['_', '-'], ' ', $key));

            if (is_array($value)) {
                $nested = $this->cleanAndHumanize($value);
                if (!empty($nested)) $out[$label] = $nested;
            } else {
                $out[$label] = $value;
            }
        }

        return $out;
    }
}
