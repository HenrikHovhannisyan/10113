<?php

namespace App\Http\Controllers\Forms;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Forms\Deduction;
use App\Models\TaxReturn;
use Illuminate\Support\Facades\Storage;

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

        // Keep file structure like IncomeController does
        $attach = $existing ? ($existing->attach ?? []) : [];

        // Single file fields (overwrite if new file provided)
        $this->handleSingleFile($request, $attach, 'computer.computer_file', 'computer');
        $this->handleSingleFile($request, $attach, 'travel_expenses.travel_file', 'travel_expenses');
        $this->handleSingleFile($request, $attach, 'union_fees.file', 'union_fees');
        $this->handleSingleFile($request, $attach, 'sun_protection.sun_file', 'sun_protection');
        $this->handleSingleFile($request, $attach, 'education.edu_file', 'education');
        $this->handleSingleFile($request, $attach, 'uniforms.uniform_receipt', 'uniforms');
        $this->handleSingleFile($request, $attach, 'books.books_file', 'books');
        $this->handleSingleFile($request, $attach, 'home_office.home_receipt', 'home_office');

        // Multiple file field: Low Value Pool
        if ($request->hasFile('low_value_pool.files')) {
            if (!empty($attach['low_value_pool']['files'])) {
                foreach ($attach['low_value_pool']['files'] as $oldFile) {
                    Storage::disk('public')->delete($oldFile);
                }
            }
            $paths = [];
            foreach ($request->file('low_value_pool.files') as $file) {
                $paths[] = $file->store('low_value_pool', 'public');
            }
            $attach['low_value_pool']['files'] = $paths;
        }

        $data['attach'] = $attach;

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

    private function handleSingleFile(Request $request, array &$attach, string $input, string $folder)
    {
        [$field, $key] = explode('.', $input);

        if ($request->hasFile($input)) {
            // Delete old if exists
            if (!empty($attach[$field][$key])) {
                Storage::disk('public')->delete($attach[$field][$key]);
            }

            $attach[$field][$key] = $request->file($input)->store($folder, 'public');
        }
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
