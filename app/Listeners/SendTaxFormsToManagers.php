<?php

namespace App\Listeners;

use App\Events\TaxPaymentSucceeded;
use App\Mail\FormsSubmittedWithAttachments;
use Illuminate\Support\Facades\Mail;

class SendTaxFormsToManagers
{
    public function handle(TaxPaymentSucceeded $event): void
    {
        $tax = $event->tax->load(['user', 'other', 'basicInfo', 'deduction', 'income']);

        $allFiles = $this->collectAttachments($tax->other->attach ?? null);

        $managerEmails = array_filter(
            array_map('trim', explode(',', env('MANAGER_EMAILS', 'manager1@example.com')))
        );

        foreach ($managerEmails as $email) {
            Mail::to($email)->send(
                new FormsSubmittedWithAttachments($tax, $allFiles, $tax->other, $tax->basicInfo)
            );
        }
    }

    private function collectAttachments($attachData): array
    {
        $files = [];

        $data = is_array($attachData)
            ? $attachData
            : json_decode($attachData ?? '[]', true);

        foreach ($data ?? [] as $relativePath) {
            $fullPath = storage_path('app/public/' . ltrim($relativePath, '/'));
            if (file_exists($fullPath)) {
                $files[] = $fullPath;
            }
        }

        return $files;
    }
}
