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

    public function __construct($tax, $files = [], $other = null)
    {
        $this->tax   = $tax;
        $this->files = $files;

        if ($other instanceof \Illuminate\Database\Eloquent\Collection) {
            $raw = $other->toArray();
        } elseif ($other instanceof \Illuminate\Database\Eloquent\Model) {
            $raw = [$other->toArray()];
        } elseif (is_array($other)) {
            $raw = $other;
        } else {
            $raw = [];
        }

        $this->other = array_values(array_filter(array_map(
            fn($item) => $this->cleanAndHumanize((array)$item),
            $raw
        )));
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
                'tax'   => $this->tax,
                'other' => $this->other,
            ],
        );
    }

    public function attachments(): array
    {
        $attachments = [];

        // ✅ Attach all files from Listener
        foreach ($this->files as $file) {
            if ($file && file_exists($file)) {
                $fileName = basename($file); // keep original name
                $attachments[] = Attachment::fromPath($file)->as($fileName);
            }
        }

        // ✅ Generate PDF summary of $other data
        if (!empty($this->other)) {
            $pdf = Pdf::loadView('pdf.other_data', [
                'other' => $this->other,
                'tax'   => $this->tax
            ]);

            $pdfContent = $pdf->output();

            if (!empty($pdfContent)) {
                $attachments[] = Attachment::fromData(
                    fn () => $pdfContent,
                    'OtherFormData.pdf'
                )->withMime('application/pdf');
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
