<?php

namespace App\Http\Controllers\Forms;

use App\Http\Controllers\Controller;
use App\Models\Forms\BasicInfoForm;
use App\Models\TaxReturn;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BasicInfoFormController extends Controller
{

    /**
     * Store/update resource with AJAX support
     */
    private function saveBasicInfo(Request $request, $id = null)
    {
        $rules = [
            'first_name' => 'nullable|string|max:255',
            'last_name' => 'nullable|string|max:255',
            'first_name' => 'nullable|string|max:255',
            'last_name' => 'nullable|string|max:255',
            'day' => 'nullable|integer|min:1|max:31',
            'month' => 'nullable|integer|min:1|max:12',
            'year' => 'nullable|integer|min:1900|max:' . date('Y'),
            'phone' => 'nullable|string|max:20',
            'gender' => 'nullable|in:male,female',
            'has_spouse' => 'nullable|in:yes,no',
            'future_tax_return' => 'nullable|in:yes,no',
            'australian_citizenship' => 'nullable|in:yes,no',
            'visa_type' => 'nullable|string',
            'other_visa_type' => 'nullable|string',
            'long_stay_183' => 'nullable|in:yes,no',
            'arrival_month' => 'nullable|integer|min:1|max:12',
            'arrival_year' => 'nullable|integer|min:1990|max:' . date('Y'),
            'departure_month' => 'nullable|integer|min:1|max:12',
            'departure_year' => 'nullable|integer|min:1990|max:' . date('Y'),
            'stay_purpose' => 'nullable|in:holiday,work,study',
            'full_tax_year' => 'nullable|in:yes,no',
            'home_address' => 'nullable|string',
            'same_as_home_address' => 'nullable|in:yes,no',
            'postal_address' => 'nullable|string',
            'has_education_debt' => 'nullable|in:yes,no',
            'has_sfss_debt' => 'nullable|in:yes,no',
            'other_tax_debts' => 'nullable|string',
            'occupation' => 'nullable|string',
            'other_occupation' => 'nullable|string',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation errors',
                'errors' => $validator->errors()
            ], 422);
        }

        $validated = $validator->validated();

        foreach (
            [
                'has_spouse',
                'future_tax_return',
                'australian_citizenship',
                'long_stay_183',
                'full_tax_year',
                'same_as_home_address',
                'has_education_debt',
                'has_sfss_debt'
            ] as $field
        ) {
            if (isset($validated[$field])) {
                $validated[$field] = $validated[$field] === 'yes' ? 1 : 0;
            }
        }

        $taxReturn = TaxReturn::where('user_id', auth()->id())->first();

        if (!$taxReturn) {
            return response()->json([
                'success' => false,
                'message' => 'Tax Return not found'
            ], 404);
        }

        $validated['tax_return_id'] = $taxReturn->id;

        if ($id) {
            $basicInfo = BasicInfoForm::findOrFail($id);

            if ($basicInfo->taxReturn->user_id !== auth()->id()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Unauthorized'
                ], 403);
            }

            $basicInfo->update($validated);
            $message = 'Form updated successfully!';
        } else {
            $basicInfo = BasicInfoForm::create($validated);
            $message = 'Form saved successfully!';
        }

        return response()->json([
            'success' => true,
            'message' => $message,
            'basicInfoId' => $basicInfo->id
        ]);
    }


    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        return $this->saveBasicInfo($request);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        return $this->saveBasicInfo($request, $id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
