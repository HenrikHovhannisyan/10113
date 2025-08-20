<?php

namespace App\Http\Controllers;

use App\Models\TaxReturn;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TaxReturnController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $incompleteForm = TaxReturn::where('user_id', auth()->id())
            ->where('form_status', 'incomplete')
            ->latest()
            ->first();

        return view('pages.tax-returns.index', compact('incompleteForm'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $taxReturn = TaxReturn::create([
            'user_id' => auth()->id(),
            'form_status' => 'incomplete',
            'payment_status' => 'unpaid',
        ]);
        return view('pages.tax-returns.create', compact('taxReturn'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(TaxReturn $taxReturn)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TaxReturn $taxReturn)
    {
        $basicInfo = $taxReturn->basicInfos()->first();
        $incomes = $taxReturn->incomes()->first();
        $deductions = $taxReturn->deductions()->first();
        $other = $taxReturn->other()->first();
        return view('pages.tax-returns.create', compact('taxReturn', 'basicInfo', 'incomes', 'deductions', 'other'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, TaxReturn $taxReturn)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TaxReturn $taxReturn)
    {
        //
    }
}
