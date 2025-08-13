<?php

namespace App\Http\Controllers\Forms;

use App\Http\Controllers\Controller;
use App\Models\Forms\Other;
use Illuminate\Http\Request;
use App\Models\TaxReturn;

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
            'zone_overseas_forces_offset' => $request->input('zone_overseas_forces_offset', []),
            'any_dependent_children' => $request->input('any_dependent_children', null),
            'income_tests' => $request->input('income_tests', []),
            'mls' => $request->input('mls', []),
        ];


        // Handle "attach" section (text + files)
        $attach = [];

        // Keep existing attach data if updating
        if ($id) {
            $existing = Other::findOrFail($id);
            $attach = $existing->attach ?? [];
        }

        // Save text input
        $attach['additional_questions'] = $request->input('additional_questions', $attach['additional_questions'] ?? '');



        // Handle uploaded files
        if ($request->hasFile('additional_file')) {
            foreach ($request->file('additional_file') as $file) {
                $path = $file->store('attachments', 'public'); // storage/app/public/attachments
                $attach['additional_file'][] = $path;
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
