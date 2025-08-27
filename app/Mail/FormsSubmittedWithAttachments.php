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
    public array $files;
    public array $other;
    public array $basicInfo;

    private array $hiddenKeys = ['id', 'created_at', 'updated_at'];

    public function __construct($tax, array $files = [], $other = null, $basicInfo = null)
    {
        $this->tax       = $tax;
        $this->files     = $files;
        $this->other     = $this->normalizeAndClean($other);
        $this->basicInfo = $this->normalizeAndClean($basicInfo);
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
            with: ['tax' => $this->tax],
        );
    }

    public function attachments(): array
    {
        $attachments = [];

        // Attach provided files
        foreach ($this->files as $file) {
            if (file_exists($file)) {
                $attachments[] = Attachment::fromPath($file)->as(basename($file));
            }
        }

        // Generate summary PDFs
        $attachments = array_merge(
            $attachments,
            $this->generatePdfAttachment($this->other, 'Other Data', 'OtherFormData.pdf'),
            $this->generatePdfAttachment($this->basicInfo, 'Basic Info', 'BasicInfoFormData.pdf')
        );

        return $attachments;
    }

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
