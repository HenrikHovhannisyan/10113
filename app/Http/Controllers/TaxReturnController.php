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
        return view('pages.tax-returns.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        TaxReturn::create();
        return view('pages.tax-returns.create');
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
        //
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
