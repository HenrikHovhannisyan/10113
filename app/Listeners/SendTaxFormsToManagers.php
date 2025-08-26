<?php

namespace App\Listeners;

use App\Events\TaxPaymentSucceeded;
use App\Mail\FormsSubmittedWithAttachments;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

class SendTaxFormsToManagers
{
    public function handle(TaxPaymentSucceeded $event)
    {
        $tax = $event->tax->load('user', 'other.basicInfo', 'other.deduction', 'other.income');

        $otherFiles = [];

        if ($tax->other && !empty($tax->other->attach)) {
            $attachData = is_array($tax->other->attach)
                ? $tax->other->attach
                : json_decode($tax->other->attach, true);

            if ($attachData && is_array($attachData)) {
                foreach ($attachData as $section => $files) {
                    if (is_array($files)) {
                        foreach ($files as $file) {
                            $fullPath = storage_path('app/public/' . ltrim($file, '/'));
                            if ($file && file_exists($fullPath)) {
                                $otherFiles[] = $fullPath;
                            }
                        }
                    } else {
                        $fullPath = storage_path('app/public/' . ltrim($files, '/'));
                        if ($files && file_exists($fullPath)) {
                            $otherFiles[] = $fullPath;
                        }
                    }
                }
            }
        }

        $otherData = [
            'other'     => $tax->other ? [$tax->other] : [],
            'basicInfo' => $tax->other->basicInfo ?? [],
            'deduction' => $tax->other->deduction ?? [],
            'income'    => $tax->other->income ?? [],
        ];

        $managerEmails = explode(',', env('MANAGER_EMAILS', 'manager1@example.com'));

        foreach ($managerEmails as $email) {
            Mail::to(trim($email))->send(
                new FormsSubmittedWithAttachments($tax, $otherFiles, $otherData)
            );
        }
    }
}
