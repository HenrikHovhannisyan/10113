<?php

namespace App\Http\Controllers\Forms;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TaxReturn;
use App\Models\Forms\Income;
use Illuminate\Support\Facades\Storage;

class IncomeController extends Controller
{
    private function saveIncome(Request $request, $id = null)
    {
        $taxReturn = TaxReturn::where('user_id', auth()->id())->first();

        if (!$taxReturn) {
            return response()->json([
                'success' => false,
                'message' => 'Tax Return not found'
            ], 404);
        }

        $existing = $id ? Income::findOrFail($id) : null;

        // Prepare all data fields
        $fields = [
            'salary',
            'interests',
            'dividends',
            'government_allowances',
            'government_pensions',
            'capital_gains',
            'managed_funds',
            'termination_payments',
            'rent',
            'partnerships',
            'annuities',
            'superannuation',
            'super_lump_sums',
            'ess',
            'personal_services',
            'business_income',
            'business_losses',
            'foreign_income',
            'other_income'
        ];

        $data = [];
        foreach ($fields as $field) {
            $data[$field] = $request->input($field, $existing->$field ?? []);
        }

        // Handle "attach" section (files)
        $attach = [];

        // Keep existing attach data if updating
        if ($existing) {
            $attach = $existing->attach ?? [];
        }

        // Handle file uploads for different sections
        $this->handleCapitalGainsFiles($request, $attach);
        $this->handleManagedFundsFiles($request, $attach);
        $this->handleTerminationPaymentsFiles($request, $attach);
        $this->handleRentFiles($request, $attach);

        $data['attach'] = $attach;

        if ($existing) {
            $existing->update($data);
            $message = 'Income data updated successfully!';
        } else {
            $income = Income::create(array_merge($data, [
                'tax_return_id' => $taxReturn->id
            ]));
            $message = 'Income data saved successfully!';
        }

        return response()->json([
            'success'  => true,
            'message'  => $message,
            'incomeId' => $existing->id ?? $income->id
        ]);
    }

    private function handleCapitalGainsFiles(Request $request, array &$attach)
    {
        if ($request->hasFile('capital_gains.cgt_attachment')) {
            // Delete old file if exists
            if (!empty($attach['capital_gains_attachment'])) {
                Storage::disk('public')->delete($attach['capital_gains_attachment']);
            }

            // Store new file
            $file = $request->file('capital_gains.cgt_attachment');
            $attach['capital_gains_attachment'] = $file->store('capital_gains', 'public');
        }
    }

    private function handleManagedFundsFiles(Request $request, array &$attach)
    {
        if ($request->hasFile('managed_fund_files')) {
            // Delete old files if they exist
            if (!empty($attach['managed_fund_files'])) {
                foreach ($attach['managed_fund_files'] as $oldFile) {
                    Storage::disk('public')->delete($oldFile);
                }
            }

            // Store new files
            $files = $request->file('managed_fund_files');
            $paths = [];
            foreach ($files as $file) {
                $paths[] = $file->store('managed_funds', 'public');
            }
            $attach['managed_fund_files'] = $paths;
        }
    }

    private function handleTerminationPaymentsFiles(Request $request, array &$attach)
    {
        $etpFiles = $request->file('termination_payments', []);

        foreach ($etpFiles as $index => $files) {
            if ($request->hasFile("termination_payments.$index.etp_files")) {
                // Delete old files if they exist
                if (!empty($attach['termination_payments'][$index]['etp_files'])) {
                    foreach ($attach['termination_payments'][$index]['etp_files'] as $oldFile) {
                        Storage::disk('public')->delete($oldFile);
                    }
                }

                // Store new files
                $paths = [];
                foreach ($files['etp_files'] as $file) {
                    $paths[] = $file->store('termination_payments', 'public');
                }
                $attach['termination_payments'][$index]['etp_files'] = $paths;
            }
        }
    }

    private function handleRentFiles(Request $request, array &$attach)
    {
        $rentFiles = $request->file('rent', []);

        foreach ($rentFiles as $index => $files) {
            if ($request->hasFile("rent.$index.rent_files")) {
                // Delete old files if they exist
                if (!empty($attach['rent'][$index]['rent_files'])) {
                    foreach ($attach['rent'][$index]['rent_files'] as $oldFile) {
                        Storage::disk('public')->delete($oldFile);
                    }
                }

                // Store new files
                $paths = [];
                foreach ($files['rent_files'] as $file) {
                    $paths[] = $file->store('rent', 'public');
                }
                $attach['rent'][$index]['rent_files'] = $paths;
            }
        }
    }

    public function store(Request $request)
    {
        return $this->saveIncome($request);
    }

    public function update(Request $request, string $id)
    {
        return $this->saveIncome($request, $id);
    }
}
