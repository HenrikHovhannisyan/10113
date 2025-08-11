<?php

namespace App\Http\Controllers\Forms;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TaxReturn;
use App\Models\Forms\Income;
use Illuminate\Support\Facades\Validator;

class IncomeController extends Controller
{
    private function saveIncome(Request $request, $id = null)
    {
        $data = $request->all();

        $booleanFields = [
            'cgt_concession_active',
            'cgt_concession_retirement',
            'cgt_concession_rollover',
            'psi_voluntary_agreement',
            'psi_abn_not_quoted',
            'psi_labour_hire',
            'labour_hire',
            'credit_paid_by_trustee',
        ];

        foreach ($booleanFields as $field) {
            if (isset($data[$field])) {
                $data[$field] = $data[$field] === 'yes' ? 1 : 0;
            }
        }

        $taxReturn = TaxReturn::where('user_id', auth()->id())->first();

        if (!$taxReturn) {
            return response()->json([
                'success' => false,
                'message' => 'Tax Return not found'
            ], 404);
        }

        $data['tax_return_id'] = $taxReturn->id;
        if ($id) {
            $income = Income::findOrFail($id);

            if ($income->taxReturn->user_id !== auth()->id()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Unauthorized'
                ], 403);
            }

            $income->update($data);
            $message = 'Income data updated successfully!';
        } else {
            $income = Income::create($data);
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
