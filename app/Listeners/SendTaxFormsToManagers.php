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
//        $tax = $event->tax->load('forms', 'user');

        $user = (object)[
            'id' => 1,
            'name' => 'John Doe',
            'email' => 'john@example.com'
        ];

        // Fake tax return
        $tax = (object)[
            'id' => 123,
            'user' => $user,
            'payment_status' => 'paid',
            'payment_reference' => 'ch_fake_' . uniqid(),
            'forms' => collect([
                (object)[
                    'id' => 1,
                    'user' => $user,
                    'created_at' => Carbon::now()->subDays(2),
                    'data' => [
                        'name' => 'Form A',
                        'amount' => 250.75,
                        'description' => 'Office expenses'
                    ]
                ],
                (object)[
                    'id' => 2,
                    'user' => $user,
                    'created_at' => Carbon::now()->subDay(),
                    'data' => [
                        'name' => 'Form B',
                        'amount' => 132.40,
                        'description' => 'Travel reimbursement'
                    ]
                ]
            ])
        ];


        $pdfFiles = [];

        foreach ($tax->forms as $form) {
            $pdf = PDF::loadView('pdf.form_template', ['form' => $form]);

            $fileName = 'form_' . $form->id . '.pdf';
            $filePath = 'forms/' . $fileName;

            Storage::put('public/' . $filePath, $pdf->output());

            $pdfFiles[] = storage_path('app/public/' . $filePath);
        }

        $managerEmails = explode(',', env('MANAGER_EMAILS', 'manager1@example.com'));

        foreach ($managerEmails as $email) {
            Mail::to(trim($email))->send(new FormsSubmittedWithAttachments($tax, $pdfFiles));
        }

        // Cleanup
        foreach ($pdfFiles as $file) {
            if (file_exists($file)) {
                unlink($file);
            }
        }
    }
}

