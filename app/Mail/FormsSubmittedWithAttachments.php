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


    /**
     * @param $tax
     * @param $files
     * @param $other
     */
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

        // Normalize every record
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
     * @var array|string[]
     */
    private array $hiddenKeys = ['id', 'created_at', 'updated_at', 'attach'];

    /**
     * @param array $data
     * @return array
     */
    private function cleanAndHumanize(array $data): array
    {
        $out = [];

        foreach ($data as $key => $value) {
            // skip hidden keys
            if (in_array(strtolower($key), $this->hiddenKeys, true)) {
                continue;
            }

            // skip null/empty values
            if (is_null($value) || $value === '' || (is_array($value) && empty($value))) {
                continue;
            }

            // humanize label
            $label = ucwords(preg_replace('/[_\-]+/', ' ', (string)$key));

            if (is_array($value)) {
                $nested = $this->cleanAndHumanize($value);
                // keep section only if it has content after cleaning
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


