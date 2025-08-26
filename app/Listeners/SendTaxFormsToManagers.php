<?php

namespace App\Listeners;

use App\Events\TaxPaymentSucceeded;
use App\Mail\FormsSubmittedWithAttachments;
use Illuminate\Support\Facades\Mail;

class SendTaxFormsToManagers
{
    public function handle(TaxPaymentSucceeded $event)
    {
        $tax = $event->tax->load('user', 'other', 'basicInfo', 'deduction', 'income');

        $pdfFiles = []; // (if you want to generate PDFs for forms, you can uncomment later)

        $otherFiles = [];

        // Collect attachments from "other.attach" JSON column

        if ($tax->other && !empty($tax->other->attach)) {
            $attachData = is_array($tax->other->attach)
                ? $tax->other->attach
                : json_decode($tax->other->attach, true);

            if ($attachData && is_array($attachData)) {
                foreach ($attachData as $label => $relativePath) {

                    $fullPath = storage_path('app/public/' . ltrim($relativePath, '/'));
                    if ($relativePath && file_exists($fullPath)) {
                        $otherFiles[] = $fullPath;
                    }
                }
            }
        }

        // Merge PDFs + Other attachments
        $allFiles = array_merge($pdfFiles, $otherFiles);


        // Manager emails from .env
        $managerEmails = explode(',', env('MANAGER_EMAILS', 'manager1@example.com'));

        foreach ($managerEmails as $email) {
            Mail::to(trim($email))->send(
                new FormsSubmittedWithAttachments($tax, $allFiles, $tax->other)
            );
        }
    }
}
