<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SalesTargetController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $salesTargets = \App\Models\SalesTarget::orderBy('date', 'desc')->get();
        return view('admin.sales-targets.index', compact('salesTargets'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.sales-targets.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'date' => 'required|date',
            'food_gross_sale' => 'nullable|numeric',
            'food_discounts' => 'nullable|numeric',
            'food_complimentary' => 'nullable|numeric',
            'food_net_sale' => 'nullable|numeric',
            'other_tax_income' => 'nullable|numeric',
            'other_service_charges' => 'nullable|numeric',
            'other_decor_income' => 'nullable|numeric',
            'other_total_sale' => 'nullable|numeric',
        ]);

        \App\Models\SalesTarget::create($validated);

        return redirect()->route('admin.sales-targets.index')->with('success', 'Sales target created successfully.');
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
        $salesTarget = \App\Models\SalesTarget::findOrFail($id);
        return view('admin.sales-targets.edit', compact('salesTarget'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $salesTarget = \App\Models\SalesTarget::findOrFail($id);

        $validated = $request->validate([
            'date' => 'required|date',
            'food_gross_sale' => 'nullable|numeric',
            'food_discounts' => 'nullable|numeric',
            'food_complimentary' => 'nullable|numeric',
            'food_net_sale' => 'nullable|numeric',
            'other_tax_income' => 'nullable|numeric',
            'other_service_charges' => 'nullable|numeric',
            'other_decor_income' => 'nullable|numeric',
            'other_total_sale' => 'nullable|numeric',
        ]);

        $salesTarget->update($validated);

        return redirect()->route('admin.sales-targets.index')->with('success', 'Sales target updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $salesTarget = \App\Models\SalesTarget::findOrFail($id);
        $salesTarget->delete();

        return redirect()->route('admin.sales-targets.index')->with('success', 'Sales target deleted successfully.');
    }
}
