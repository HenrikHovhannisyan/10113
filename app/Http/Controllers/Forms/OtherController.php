<?php

namespace App\Http\Controllers\Forms;

use App\Http\Controllers\Controller;
use App\Models\Forms\Other;
use Illuminate\Http\Request;
use App\Models\TaxReturn;
use Illuminate\Support\Facades\Storage;

class OtherController extends Controller
{

    /**
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    private function saveOther(Request $request, $id = null)
    {

        $taxReturn = TaxReturn::where('user_id', auth()->id())->first();

        if (!$taxReturn) {
            return response()->json([
                'success' => false,
                'message' => 'Tax Return not found'
            ], 404);
        }


        $data = [
            'zone_overseas_forces_offset' => $request->input('zone_overseas_forces_offset', null),
            'any_dependent_children' => $request->input('any_dependent_children', null),
            'income_tests' => $request->input('income_tests',  null),
            'mls' => $request->input('mls', null),
            'seniors_offset' => $request->input('seniors_offset', null),
            'spouse_details' => $request->input('spouse_details', null),
            'private_health_insurance' => $request->input('private_health_insurance', null),
            'part_year_tax_free_threshold' => $request->input('part_year_tax_free_threshold', null),
            'under_18' => $request->input('under_18', null),
            'working_holiday_maker_net_income' => $request->input('working_holiday_maker_net_income', null),
            'superannuation_income_stream_offset' => $request->input('superannuation_income_stream_offset', null),
            'superannuation_contributions_spouse' => $request->input('superannuation_contributions_spouse', null),
            'tax_losses_earlier_income_years' => $request->input('tax_losses_earlier_income_years', null),
            'dependent_invalid_and_carer' => $request->input('dependent_invalid_and_carer', null),
            'superannuation_co_contribution' => $request->input('superannuation_co_contribution', null),
            'other_tax_offsets_refundable' => $request->input('other_tax_offsets_refundable', null),
        ];


        // Handle "attach" section (text + files)
        $attach = [];

        // Keep existing attach data if updating
        if ($id) {
            $existing = Other::findOrFail($id);
            $attach = $existing->attach ?? [];
        }


        // Handle uploaded files
        if ($request->hasFile('additional_file')) {
            // Delete old files from storage if they exist
            if (!empty($attach['additional_file'])) {
                foreach ($attach['additional_file'] as $oldFile) {
                    if (Storage::disk('public')->exists($oldFile)) {
                        Storage::disk('public')->delete($oldFile);
                    }
                }
            }

            // Replace with new files
            $attach['additional_file'] = [];
            foreach ($request->file('additional_file') as $file) {
                $path = $file->store('attachments', 'public');
                $attach['additional_file'][] = $path;
            }
        }

        if ($request->has('private_health_insurance')) {
            $phiFiles = $request->file('private_health_insurance', []);

            foreach ($phiFiles as $key => $file) {
                if ($file) {
                    // Delete old file if it exists
                    if (!empty($attach['private_health_insurance'][$key])) {
                        $oldFile = $attach['private_health_insurance'][$key];
                        if (Storage::disk('public')->exists($oldFile)) {
                            Storage::disk('public')->delete($oldFile);
                        }
                    }

                    // Store new file
                    $path = $file->store('attachments', 'public');
                    $attach['private_health_insurance'][$key] = $path;
                }
            }
        }

        $data['attach'] = $attach;


        if ($id) {
            $other = Other::findOrFail($id);
            $other->update($data);
            $message = 'Other data updated successfully!';
        } else {
            $other = Other::create(array_merge($data, [
                'tax_return_id' => $taxReturn->id
            ]));
            $message = 'Other data saved successfully!';
        }

        return response()->json([
            'success' => true,
            'message' => $message,
            'otherId' => $other->id
        ]);
    }


    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        return $this->saveOther($request);
    }


    /**
     * @param Request $request
     * @param string $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, string $id)
    {
        return $this->saveOther($request, $id);
    }
}
