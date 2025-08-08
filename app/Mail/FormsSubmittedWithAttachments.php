<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Attachment;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class FormsSubmittedWithAttachments extends Mailable
{
    use Queueable, SerializesModels;

    public $tax;
    public $files;

    /**
     * Create a new message instance.
     */
    public function __construct($tax, $files)
    {
        $this->tax = $tax;
        $this->files = $files;
    }

    /**
     * Define the envelope (subject, etc).
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Tax Forms Submitted',
        );
    }

    /**
     * Define the email view and data passed to it.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.forms_submitted',
            with: [
                'tax' => $this->tax,
            ],
        );
    }

    /**
     * Attach multiple PDF files to the email.
     */
    public function attachments(): array
    {
        return collect($this->files)->map(function ($filePath) {
            return Attachment::fromPath($filePath);
        })->all();
    }
}
