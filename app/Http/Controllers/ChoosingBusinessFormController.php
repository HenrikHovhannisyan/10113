<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\ChoosingBusinessForm;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ChoosingBusinessFormController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $form = ChoosingBusinessForm::firstOrCreate(
            ['user_id' => auth()->id()],
            ['basic_info' => [], 'income' => [], 'deduction' => [], 'other' => []]
        );

        return view('pages.choosing-business-type', compact('form'));
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
        $validated = $request->all();

        $form = ChoosingBusinessForm::updateOrCreate(
            ['user_id' => Auth::id()],
            ['basic_info' => $validated]
        );

        return redirect()->back()->with('success', 'Form saved successfully!');
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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function save(Request $request)
    {
        $form = ChoosingBusinessForm::firstOrCreate(
            ['user_id' => auth()->id()]
        );

        $tab = $request->input('tab');
        $data = json_decode($request->input('form_data'), true);

        switch ($tab) {
            case 'basic-info':
                $form->basic_info = $data;
                break;
            case 'income':
                $form->income = $data;
                break;
            case 'deduction':
                $form->deduction = $data;
                break;
            case 'other-details':
                $form->other = $data;
                break;
        }

        $form->status = 'draft';
        $form->save();

        return redirect()->back()->with('success', 'Form saved successfully!');
    }
}
