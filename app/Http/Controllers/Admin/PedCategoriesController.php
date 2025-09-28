<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PedCategories;
use Illuminate\Http\Request;

class PedCategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ped_categories = PedCategories::all();
        return view('admin-dashboard.ped-categories.index', compact('ped_categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin-dashboard.ped-categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'category_name'   => 'required|string|max:255',
            'reason_for_use'  => 'nullable|string',
            'unit_price'      => 'required|numeric|min:0',
            'status'          => 'required|in:active,inactive',
        ]);

        PedCategories::create($validated);

        flash()->success('Yeni PED kateqoriyası uğurla əlavə edildi');
        return redirect()->route('ped-categories.index');
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
        $decrypted = decrypt($id);
        $ped_category = PedCategories::findOrFail($decrypted);
        if(!$ped_category)
        {
            return flash()->error('Kateqoriya tapılmadı.');
        }
        return view('admin-dashboard.ped-categories.edit', compact('ped_category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $decrypted = decrypt($id);
        $ped_category = PedCategories::findOrFail($decrypted);
        if(!$ped_category)
        {
            return flash()->error('Kateqoriya tapılmadı.');
        }
        $validated = $request->validate([
            'category_name'   => 'required|string|max:255',
            'reason_for_use'  => 'nullable|string',
            'unit_price'      => 'required|numeric|min:0',
            'status'          => 'required|in:active,inactive',
        ]);

        $ped_category->update($validated);

        return redirect()->route('ped-categories.index')
            ->with('success', 'PED kateqoriya uğurla yeniləndi.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
