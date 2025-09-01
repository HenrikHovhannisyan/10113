<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\{Attachment, Content, Envelope};
use Illuminate\Queue\SerializesModels;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class FormsSubmittedWithAttachments extends Mailable
{
    use Queueable, SerializesModels;

    public $tax;
    public array $other;
    public array $basicInfo;
    public array $income;
    public array $deduction;

    // Separate attachment arrays
    public array $otherFiles;
    public array $deductionFiles;
    public array $incomeFiles;

    /**
     * @var array|string[]
     */
    private array $hiddenKeys = ['id', 'created_at', 'updated_at'];

    /**
     * @param $tax
     * @param array $otherFiles
     * @param array $deductionFiles
     * @param array $incomeFiles
     * @param $other
     * @param $basicInfo
     * @param $income
     * @param $deduction
     */
    public function __construct(
        $tax,
        array $otherFiles = [],
        array $deductionFiles = [],
        array $incomeFiles = [],
        $other = null,
        $basicInfo = null,
        $income = null,
        $deduction = null
    ) {
        $this->tax           = $tax;

        $this->otherFiles    = $otherFiles;
        $this->deductionFiles = $deductionFiles;
        $this->incomeFiles    = $incomeFiles;

        $this->other     = $this->normalizeAndClean($other);
        $this->basicInfo = $this->normalizeAndClean($basicInfo);
        $this->income    = $this->normalizeAndClean($income);
        $this->deduction = $this->normalizeAndClean($deduction);
    }

    /**
     * @return Envelope
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: "Tax Forms Submitted - Tax ID #{$this->tax->id}"
        );
    }

    /**
     * @return Content
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.forms_submitted',
            with: ['tax' => $this->tax],
        );
    }

    /**
     * @return array
     */
    public function attachments(): array
    {
        $attachments = [];

        // Attach "Other" files
        foreach ($this->otherFiles as $file) {
            if (file_exists($file)) {
                $attachments[] = Attachment::fromPath($file)
                    ->as('Other_' . basename($file));
            }
        }

        // Attach "Deduction" files
        foreach ($this->deductionFiles as $file) {
            if (file_exists($file)) {
                $attachments[] = Attachment::fromPath($file)
                    ->as('Deduction_' . basename($file));
            }
        }

        // Attach "Income" files
        foreach ($this->incomeFiles as $file) {
            if (file_exists($file)) {
                $attachments[] = Attachment::fromPath($file)
                    ->as('Income_' . basename($file));
            }
        }

        // Generate summary PDFs
        $attachments = array_merge(
            $attachments,
            $this->generatePdfAttachment($this->other, 'Other Data', 'OtherFormData.pdf'),
            $this->generatePdfAttachment($this->basicInfo, 'Basic Info', 'BasicInfoFormData.pdf'),
            $this->generatePdfAttachment($this->income, 'Income Info', 'IncomeFormData.pdf'),
            $this->generatePdfAttachment($this->deduction, 'Deduction Info', 'DeductionFormData.pdf')
        );

        return $attachments;
    }

    /**
     * @param $data
     * @return array
     */
    private function normalizeAndClean($data): array
    {
        if ($data instanceof Collection) {
            $raw = $data->toArray();
        } elseif ($data instanceof Model) {
            $raw = [$data->toArray()];
        } elseif (is_array($data)) {
            $raw = $data;
        } else {
            $raw = [];
        }

        return array_values(array_filter(array_map(
            fn($item) => $this->cleanAndHumanize((array)$item),
            $raw
        )));
    }

    /**
     * @param array $data
     * @param string $name
     * @param string $fileName
     * @return array
     */
    private function generatePdfAttachment(array $data, string $name, string $fileName): array
    {
        if (empty($data)) {
            return [];
        }

        $pdfContent = Pdf::loadView('pdf.pdf_data', [
            'other' => $data,
            'tax'   => $this->tax,
            'name'  => $name,
        ])->output();

        return $pdfContent
            ? [Attachment::fromData(fn() => $pdfContent, $fileName)->withMime('application/pdf')]
            : [];
    }


    /**
     * @param array $data
     * @return array
     */
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

            $label = ucwords(preg_replace('/[_\-]+/', ' ', (string) $key));

            $out[$label] = is_array($value)
                ? $this->cleanAndHumanize($value)
                : $value;
        }

        return $out;
    }
}
