<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function index()
    {
        $brands = Brand::all();
        return view('admin-dashboard.brands.index', compact('brands'));
    }

    public function create()
    {
        return view('admin-dashboard.brands.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:brands,name',
            'slug' => 'nullable|string|max:255',
            'description' => 'nullable|string',
        ]);

        Brand::create($validated);

        flash()->success('Brand successfully created');
        return redirect()->route('brands.index');
    }

    public function edit($id)
    {
        $brand = Brand::findOrFail($id);
        return view('admin-dashboard.brands.edit', compact('brand'));
    }

    public function update(Request $request, $id)
    {
        $brand = Brand::findOrFail($id);
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:brands,name,' . $brand->id,
            'slug' => 'nullable|string|max:255',
            'description' => 'nullable|string',
        ]);

        $brand->update($validated);

        flash()->success('Brand successfully updated');
        return redirect()->route('brands.index');
    }

    public function destroy($id)
    {
        $brand = Brand::findOrFail($id);
        $brand->delete();

        flash()->success('Brand successfully deleted');
        return redirect()->route('brands.index');
    }
}
