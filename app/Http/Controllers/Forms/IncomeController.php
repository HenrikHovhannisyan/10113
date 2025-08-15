<?php

namespace App\Http\Controllers\Forms;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TaxReturn;
use App\Models\Forms\Income;

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

        $data = [
            'salary'                 => $request->input('salary', []),
            'interests'              => $request->input('interests', []),
            'dividends'              => $request->input('dividends', []),
            'government_allowances'  => $request->input('government_allowances', []),
            'government_pensions'    => $request->input('government_pensions', []),
            'capital_gains'          => $request->input('capital_gains', []),
            'managed_funds'          => $request->input('managed_funds', []),
            'termination_payments'   => $request->input('termination_payments', []),
            'rent'                   => $request->input('rent', []),
            'partnerships'           => $request->input('partnerships', []),
            'annuities'              => $request->input('annuities', []),
            'superannuation'         => $request->input('superannuation', []),
            'super_lump_sums'        => $request->input('super_lump_sums', []),
            'ess'                    => $request->input('ess', []),
            'personal_services'      => $request->input('personal_services', []),
            'business_income'        => $request->input('business_income', []),
            'business_losses'        => $request->input('business_losses', []),
            'foreign_income'         => $request->input('foreign_income', []),
            'other_income'           => $request->input('other_income', []),
        ];

        // === Capital Gains File Handling ===
        $capitalGains = $data['capital_gains'];
        if ($request->hasFile('capital_gains.cgt_attachment')) {
            $file = $request->file('capital_gains.cgt_attachment');
            $path = $file->store('capital_gains', 'public');
            $capitalGains['cgt_attachment'] = $path;
        } else if ($id) {
            $existing = Income::findOrFail($id);
            $oldCapitalGains = $existing->capital_gains ?? [];
            if (isset($oldCapitalGains['cgt_attachment'])) {
                $capitalGains['cgt_attachment'] = $oldCapitalGains['cgt_attachment'];
            }
        }
        $data['capital_gains'] = $capitalGains;

        // === Managed Funds File Handling ===
        $managedFunds = $data['managed_funds'];
        if ($request->hasFile('managed_funds.managed_fund_files')) {
            $files = $request->file('managed_funds.managed_fund_files');
            $paths = [];
            foreach ($files as $file) {
                $paths[] = $file->store('managed_funds', 'public');
            }
            $managedFunds['managed_fund_files'] = $paths;
        } else if ($id) {
            $existing = Income::findOrFail($id);
            $oldManagedFunds = $existing->managed_funds ?? [];
            if (isset($oldManagedFunds['managed_fund_files'])) {
                $managedFunds['managed_fund_files'] = $oldManagedFunds['managed_fund_files'];
            }
        }
        $data['managed_funds'] = $managedFunds;

        // === Save or Update Income ===
        if ($id) {
            $income = Income::findOrFail($id);
            $income->update($data);
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
            'incomeId' => $income->id
        ]);
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
