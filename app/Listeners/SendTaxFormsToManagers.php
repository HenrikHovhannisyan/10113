<?php
namespace App\Listeners;

use App\Events\TaxPaymentSucceeded;
use App\Mail\FormsSubmittedWithAttachments;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;


class SendTaxFormsToManagers
{
    public function handle(TaxPaymentSucceeded $event)
    {
        $tax = $event->tax->load('user', 'other');

        $pdfFiles = [];

        // Generate PDF for each form
//        foreach ($tax->forms as $form) {
//            $pdf = PDF::loadView('pdf.form_template', ['form' => $form]);
//
//            $fileName = 'form_' . $form->id . '.pdf';
//            $filePath = 'forms/' . $fileName;
//
//            Storage::put('public/' . $filePath, $pdf->output());
//
//            $pdfFiles[] = storage_path('app/public/' . $filePath);
//        }

        // Collect attachments from "other.attach"
        $otherFiles = [];
        if ($tax->other && !empty($tax->other->attach)) {
            $attachData = is_array($tax->other->attach)
                ? $tax->other->attach
                : json_decode($tax->other->attach, true);

            if ($attachData) {
                foreach ($attachData as $key => $files) {
                    if (is_array($files)) {
                        foreach ($files as $file) {
                            $fullPath = storage_path('app/public/' . $file);
                            if (file_exists($fullPath)) {
                                $otherFiles[] = $fullPath;
                            }
                        }
                    } else {
                        $fullPath = storage_path('app/public/' . $files);
                        if (file_exists($fullPath)) {
                            $otherFiles[] = $fullPath;
                        }
                    }
                }
            }
        }

        // Merge PDFs + Other attachments
        $allFiles = array_merge($pdfFiles, $otherFiles);

        // Manager emails
        $managerEmails = explode(',', env('MANAGER_EMAILS', 'manager1@example.com'));

        foreach ($managerEmails as $email) {
            Mail::to(trim($email))->send(
                new FormsSubmittedWithAttachments($tax, $allFiles, $tax->other)
            );
        }

        // Cleanup generated PDFs (keep original uploads)
//        foreach ($pdfFiles as $file) {
//            if (file_exists($file)) {
//                unlink($file);
//            }
//        }
    }
}

