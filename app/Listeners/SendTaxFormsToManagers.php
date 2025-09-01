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

        // Collect attachments separately by relation
        $otherFiles     = $this->collectAttachments($tax->other->attach ?? null);
        $deductionFiles = $this->collectAttachments($tax->deduction->attach ?? null);
        $incomeFiles    = $this->collectAttachments($tax->income->attach ?? null);

        $managerEmails = array_filter(
            array_map('trim', explode(',', env('MANAGER_EMAILS', 'manager1@example.com')))
        );

        foreach ($managerEmails as $email) {
            Mail::to($email)->send(
                new FormsSubmittedWithAttachments(
                    $tax,
                    $otherFiles,
                    $deductionFiles,
                    $incomeFiles,
                    $tax->other,
                    $tax->basicInfo,
                    $tax->income,
                    $tax->deduction
                )
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
