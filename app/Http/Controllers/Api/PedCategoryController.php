<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\PedCategoryResource;
use App\Models\PedCategories;
use Illuminate\Http\Request;

class PedCategoryController extends Controller
{

    public function index()
    {
        $categories = PedCategories::with('brand')->paginate(15);
        return PedCategoryResource::collection($categories);
    }

    public function show($id)
    {
        $category = PedCategories::with('brand')->findOrFail($id);
        return new PedCategoryResource($category);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'category_name' => 'required|string|max:255',
            'reason_for_use' => 'nullable|string',
            'unit_price' => 'required|numeric|min:0',
            'status' => 'required|in:active,inactive',
            'brand_id' => 'nullable|exists:brands,id',
        ]);

        $category = PedCategories::create($validated);

        return (new PedCategoryResource($category->load('brand')))->response()->setStatusCode(201);
    }

    public function update(Request $request, $id)
    {
        $category = PedCategories::findOrFail($id);

        $validated = $request->validate([
            'category_name' => 'required|string|max:255',
            'reason_for_use' => 'nullable|string',
            'unit_price' => 'required|numeric|min:0',
            'status' => 'required|in:active,inactive',
            'brand_id' => 'nullable|exists:brands,id',
        ]);

        $category->update($validated);

        return new PedCategoryResource($category->load('brand'));
    }

    public function destroy($id)
    {
        $category = PedCategories::findOrFail($id);
        $category->delete();

        return response()->json(['message' => 'Category deleted'], 200);
    }
}
