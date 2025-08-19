<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Attachment;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Barryvdh\DomPDF\Facade\Pdf; // Ensure barryvdh/laravel-dompdf is installed

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

        // Normalize $other
        if ($other instanceof \Illuminate\Database\Eloquent\Collection) {
            $this->other = $other->toArray();
        } elseif ($other instanceof \Illuminate\Database\Eloquent\Model) {
            $this->other = [$other->toArray()];
        } elseif (is_array($other)) {
            $this->other = $other;
        } else {
            $this->other = [];
        }
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
            view: 'emails.forms_submitted', // optional for email body
            with: [
                'tax'   => $this->tax,
                'other' => $this->other,
            ],
        );
    }

    /**
     * @return array
     */
    public function attachments(): array
    {
        $attachments = [];

        // Attach files passed in $files array
        foreach ($this->files as $file) {
            if ($file && file_exists($file)) {
                $attachments[] = Attachment::fromPath($file);
            }
        }

        // Attach files from $other['attach'] JSON
        foreach ($this->other as $item) {
            if (!empty($item['attach'])) {
                // If stored as JSON string, decode it
                $attachFiles = is_string($item['attach']) ? json_decode($item['attach'], true) : $item['attach'];

                if (is_array($attachFiles)) {
                    foreach ($attachFiles as $filePath) {
                        // Make sure the path exists
                        if ($filePath && file_exists($filePath)) {
                            $attachments[] = Attachment::fromPath($filePath);
                        }
                    }
                }
            }
        }

        // Generate PDF from $other data and attach
        if (!empty($this->other)) {
            $pdf = \Barryvdh\DomPDF\Facade\Pdf::loadView('pdf.other_data', [
                'other' => $this->other,
                'tax'   => $this->tax
            ]);
            $attachments[] = Attachment::fromData(fn() => $pdf->output(), 'OtherFormData.pdf');
        }

        return $attachments;
    }


    /**
     * Convert snake_case keys to human-readable labels recursively.
     */
    private function humanizeKeys(array $data): array
    {
        $result = [];
        foreach ($data as $key => $value) {
            $label = ucwords(str_replace('_', ' ', $key));
            $result[$label] = is_array($value) ? $this->humanizeKeys($value) : $value;
        }
        return $result;
    }

}
