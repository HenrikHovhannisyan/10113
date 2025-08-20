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

        // Если обновляем, берем существующую запись
        $existing = $id ? Income::findOrFail($id) : null;

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

        // === Capital Gains File Handling ===
        if ($request->hasFile('capital_gains.cgt_attachment')) {
            $file = $request->file('capital_gains.cgt_attachment');
            $data['capital_gains']['cgt_attachment'] = $file->store('capital_gains', 'public');
        } elseif ($existing) {
            $data['capital_gains'] = $existing->capital_gains ?? [];
        }

        // === Managed Funds File Handling ===
        if ($request->hasFile('managed_funds.managed_fund_files')) {
            $files = $request->file('managed_funds.managed_fund_files');
            $paths = [];
            foreach ($files as $file) {
                $paths[] = $file->store('managed_funds', 'public');
            }
            $data['managed_funds']['managed_fund_files'] = $paths;
        } elseif ($existing) {
            $data['managed_funds'] = $existing->managed_funds ?? [];
        }

        // === Termination Payments File Handling ===
        $etps = $data['termination_payments'] ?? [];
        foreach ($etps as $index => &$etp) {
            if ($request->hasFile("termination_payments.$index.etp_files")) {
                $files = $request->file("termination_payments.$index.etp_files");
                $paths = [];
                foreach ($files as $file) {
                    $paths[] = $file->store('termination_payments', 'public');
                }
                $etp['etp_files'] = $paths;
            } elseif ($existing) {
                $oldETPs = $existing->termination_payments ?? [];
                if (isset($oldETPs[$index]['etp_files'])) {
                    $etp['etp_files'] = $oldETPs[$index]['etp_files'];
                }
            }
        }
        $data['termination_payments'] = $etps;

        // === Rent File Handling ===
        $rents = $data['rent'] ?? [];
        foreach ($rents as $index => &$rent) {
            if ($request->hasFile("rent.$index.rent_files")) {
                $files = $request->file("rent.$index.rent_files");
                $paths = [];
                foreach ($files as $file) {
                    $paths[] = $file->store('rent', 'public');
                }
                $rent['rent_files'] = $paths;
            } elseif ($existing) {
                $oldRents = $existing->rent ?? [];
                if (isset($oldRents[$index]['rent_files'])) {
                    $rent['rent_files'] = $oldRents[$index]['rent_files'];
                }
            }
        }
        $data['rent'] = $rents;

        // === Сохраняем или обновляем ===
        if ($existing) {
            $existing->update($data);
            $income = $existing;
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
