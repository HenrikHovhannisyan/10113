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

        $salaryData = $request->input('salary', []);

        if ($id) {
            $income = Income::findOrFail($id);
            $income->update([
                'salary' => $salaryData,
            ]);
            $message = 'Income data updated successfully!';
        } else {
            $income = Income::create([
                'salary' => $salaryData,
                'tax_return_id' => $taxReturn->id,
            ]);
            $message = 'Income data saved successfully!';
        }

        return response()->json([
            'success' => true,
            'message' => $message,
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
