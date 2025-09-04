<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class FormsSubmittedWithAttachments extends Mailable
{
    use Queueable, SerializesModels;

    public $tax;
    public array $other;
    public array $basicInfo;
    public array $income;
    public array $deduction;

    // Uploaded file paths (not attached; used to build links)
    public array $otherFiles;
    public array $deductionFiles;
    public array $incomeFiles;

    // Links for uploaded files
    public array $otherLinks = [];
    public array $deductionLinks = [];
    public array $incomeLinks = [];

    // Links for generated PDFs
    public ?string $otherPdf = null;
    public ?string $basicInfoPdf = null;
    public ?string $incomePdf = null;
    public ?string $deductionPdf = null;

    /**
     * @var array|string[]
     */
    private array $hiddenKeys = ['id', 'created_at', 'updated_at', 'attach'];

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
        $this->tax = $tax;

        $this->otherFiles     = $otherFiles;
        $this->deductionFiles = $deductionFiles;
        $this->incomeFiles    = $incomeFiles;

        // Normalize and clean form data for PDFs
        $this->other     = $this->normalizeAndClean($other);
        $this->basicInfo = $this->normalizeAndClean($basicInfo);
        $this->income    = $this->normalizeAndClean($income);
        $this->deduction = $this->normalizeAndClean($deduction);

        // Build public download links for the uploaded files
        $this->otherLinks     = $this->makeDownloadLinks($this->otherFiles, 'Other');
        $this->deductionLinks = $this->makeDownloadLinks($this->deductionFiles, 'Deduction');
        $this->incomeLinks    = $this->makeDownloadLinks($this->incomeFiles, 'Income');

        // Generate PDFs and store download links
        $this->otherPdf     = $this->generatePdfLink($this->other, 'Other Data', 'OtherFormData.pdf', $this->otherLinks);
        $this->basicInfoPdf = $this->generatePdfLink($this->basicInfo, 'Basic Info', 'BasicInfoFormData.pdf');
        $this->incomePdf    = $this->generatePdfLink($this->income, 'Income Info', 'IncomeFormData.pdf', $this->incomeLinks);
        $this->deductionPdf = $this->generatePdfLink($this->deduction, 'Deduction Info', 'DeductionFormData.pdf', $this->deductionLinks);
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: "Tax Forms Submitted - Tax ID #{$this->tax->id}"
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.forms_submitted',
            with: [
                'tax'            => $this->tax,
                // uploaded file links
                'otherLinks'     => $this->otherLinks,
                'deductionLinks' => $this->deductionLinks,
                'incomeLinks'    => $this->incomeLinks,
                // pdf links
                'otherPdf'       => $this->otherPdf,
                'basicInfoPdf'   => $this->basicInfoPdf,
                'incomePdf'      => $this->incomePdf,
                'deductionPdf'   => $this->deductionPdf,
            ],
        );
    }

    public function attachments(): array
    {
        // ❌ No attachments — only links in email body
        return [];
    }

    /**
     * Generate PDF, save to storage, and return public link.
     */
    private function generatePdfLink(array $data, string $name, string $fileName, array $links = []): ?string
    {
        if (empty($data)) {
            return null;
        }

        $pdfContent = Pdf::loadView('pdf.pdf_data', [
            'formData' => $data,
            'tax'      => $this->tax,
            'name'     => $name,
            'links'    => $links,
        ])->output();

        if (!$pdfContent) {
            return null;
        }

        $path = "pdfs/{$this->tax->id}_{$fileName}";
        Storage::disk('public')->put($path, $pdfContent);

        return url("storage/{$path}");
    }

    /**
     * Build links for uploaded files.
     */
    private function makeDownloadLinks(array $files, string $prefix): array
    {
        return array_map(function ($path) use ($prefix) {
            $relative = str_replace(storage_path('app/public/'), '', $path);
            return [
                'label' => $prefix . ' - ' . basename($path),
                'url'   => url('storage/' . ltrim($relative, '/')),
            ];
        }, $files);
    }

    /**
     * Normalize and clean form data for PDFs.
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
     * Clean model data and make labels human-readable.
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
