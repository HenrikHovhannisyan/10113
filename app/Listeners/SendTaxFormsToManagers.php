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

        $pdfFiles = [];
        $allFiles = [];

        // List of links that can have attach
        $relationsWithAttach = ['other', 'basicInfo', 'deduction', 'income'];

        foreach ($relationsWithAttach as $relation) {
            if ($tax->$relation && !empty($tax->$relation->attach)) {
                $attachData = is_array($tax->$relation->attach)
                    ? $tax->$relation->attach
                    : json_decode($tax->$relation->attach, true);

                if ($attachData && is_array($attachData)) {
                    foreach ($attachData as $label => $relativePath) {
                        $fullPath = storage_path('app/public/' . ltrim($relativePath, '/'));
                        if ($relativePath && file_exists($fullPath)) {
                            $allFiles[] = $fullPath;
                        }
                    }
                }
            }
        }

        $allFiles = array_merge($pdfFiles, $allFiles);

        $managerEmails = explode(',', env('MANAGER_EMAILS', 'manager1@example.com'));

        foreach ($managerEmails as $email) {
            Mail::to(trim($email))->send(
                new FormsSubmittedWithAttachments($tax, $allFiles, $tax->other)
            );
        }
    }
}
