<?php

namespace App\Http\Controllers\Forms;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Forms\Deduction;
use App\Models\TaxReturn;

class DeductionController extends Controller
{
    private function saveDeduction(Request $request, $id = null)
    {
        $taxReturn = TaxReturn::where('user_id', auth()->id())->first();

        if (!$taxReturn) {
            return response()->json([
                'success' => false,
                'message' => 'Tax Return not found'
            ], 404);
        }

        $existing = $id ? Deduction::findOrFail($id) : null;

        $fields = [
            'car_expenses',
            'travel_expenses',
            'mobile_phone',
            'internet_access',
            'computer',
            'gifts',
            'home_office',
            'books',
            'tax_affairs',
            'uniforms',
            'education',
            'tools',
            'superannuation',
            'office_occupancy',
            'union_fees',
            'sun_protection',
            'low_value_pool',
            'interest_deduction',
            'dividend_deduction',
            'upp',
            'project_pool',
            'investment_scheme',
            'other'
        ];

        $data = [];
        foreach ($fields as $field) {
            $data[$field] = $request->input($field, $existing->$field ?? []);
        }

        // === File Handling for Union Fees ===
        if ($request->hasFile('union_fees.file')) {
            $file = $request->file('union_fees.file');
            $data['union_fees']['file'] = $file->store('union_fees', 'public');
        } elseif ($existing) {
            $data['union_fees'] = $existing->union_fees ?? [];
        }

        // === Sun Protection File Handling ===
        if ($request->hasFile('sun_protection.sun_file')) {
            $file = $request->file('sun_protection.sun_file');
            $data['sun_protection']['sun_file'] = $file->store('sun_protection', 'public');
        } elseif ($existing) {
            $data['sun_protection'] = $existing->sun_protection ?? [];
        }

        // === Low Value Pool Files Handling ===
        if ($request->hasFile('low_value_pool.files')) {
            $files = $request->file('low_value_pool.files');
            $paths = [];
            foreach ($files as $file) {
                $paths[] = $file->store('low_value_pool', 'public');
            }
            $data['low_value_pool']['files'] = $paths;
        } elseif ($existing) {
            $data['low_value_pool'] = $existing->low_value_pool ?? [];
        }

        // === Education File Handling ===
        if ($request->hasFile('education.edu_file')) {
            $file = $request->file('education.edu_file');
            $data['education']['edu_file'] = $file->store('education', 'public');
        } elseif ($existing) {
            $data['education'] = $existing->education ?? [];
        }

        // === Uniforms File Handling ===
        if ($request->hasFile('uniforms.uniform_receipt')) {
            $file = $request->file('uniforms.uniform_receipt');
            $data['uniforms']['uniform_receipt'] = $file->store('uniforms', 'public');
        } elseif ($existing) {
            $data['uniforms'] = $existing->uniforms ?? [];
        }

        if ($existing) {
            $existing->update($data);
            $deduction = $existing;
            $message = 'Deduction data updated successfully!';
        } else {
            $deduction = Deduction::create(array_merge($data, [
                'tax_return_id' => $taxReturn->id
            ]));
            $message = 'Deduction data saved successfully!';
        }

        return response()->json([
            'success'     => true,
            'message'     => $message,
            'deductionId' => $deduction->id
        ]);
    }

    public function store(Request $request)
    {
        return $this->saveDeduction($request);
    }

    public function update(Request $request, string $id)
    {
        return $this->saveDeduction($request, $id);
    }
}
