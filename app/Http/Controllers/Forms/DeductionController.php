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

        $data = [
            'car_expenses'       => $request->input('car_expenses', []),
            'travel_expenses'    => $request->input('travel_expenses', []),
            'mobile_phone'       => $request->input('mobile_phone', []),
            'internet_access'    => $request->input('internet_access', []),
            'computer'           => $request->input('computer', []),
            'gifts'              => $request->input('gifts', []),
            'home_office'        => $request->input('home_office', []),
            'books'              => $request->input('books', []),
            'tax_affairs'        => $request->input('tax_affairs', []),
            'uniforms'           => $request->input('uniforms', []),
            'education'          => $request->input('education', []),
            'tools'              => $request->input('tools', []),
            'superannuation'     => $request->input('superannuation', []),
            'office_occupancy'   => $request->input('office_occupancy', []),
            'union_fees'         => $request->input('union_fees', []),
            'sun_protection'     => $request->input('sun_protection', []),
            'low_value_pool'     => $request->input('low_value_pool', []),
            'interest_deduction' => $request->input('interest_deduction', []),
            'dividend_deduction' => $request->input('dividend_deduction', []),
            'upp'                => $request->input('upp', []),
            'project_pool'       => $request->input('project_pool', []),
            'investment_scheme'  => $request->input('investment_scheme', []),
            'other'              => $request->input('other', []),
        ];
        
        if ($id) {
            $deduction = Deduction::findOrFail($id);
            $deduction->update($data);
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
