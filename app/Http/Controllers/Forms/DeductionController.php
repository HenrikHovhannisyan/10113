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

        // Поля для обычных данных
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

        // === Single files (key => storage folder) ===
        $fileFields = [
            'computer.computer_file'   => 'computer',
            'union_fees.file'          => 'union_fees',
            'sun_protection.sun_file'  => 'sun_protection',
            'education.edu_file'       => 'education',
            'uniforms.uniform_receipt' => 'uniforms',
            'books.books_file'         => 'books',
            'home_office.home_receipt' => 'home_office',
        ];

        foreach ($fileFields as $input => $folder) {
            [$field, $key] = explode('.', $input);
            if ($request->hasFile($input)) {
                $data[$field][$key] = $request->file($input)->store($folder, 'public');
            } elseif ($existing) {
                $data[$field] = $existing->$field ?? [];
            }
        }

        // === Low Value Pool (multiple files) ===
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
