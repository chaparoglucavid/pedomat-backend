<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\PackageResource;
use App\Models\Package;
use App\Models\PackageFeature;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PackageController extends Controller
{
    public function index()
    {
        $packages = Package::with('features')
            ->orderBy('order_index', 'asc')
            ->get();
        return response()->json($packages);
    }

    public function show($id)
    {
        $pkg = Package::with('features')->find($id);
        if (!$pkg) {
            return response()->json(['message' => 'Paket tapılmadı'], 404);
        }
        return new PackageResource($pkg);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'discount_percent' => 'nullable|numeric|min:0|max:100',
            'validity_days' => 'required|integer|min:1',
            'order_index' => 'nullable|integer',
            'is_popular' => 'nullable|boolean',
            'badge_text' => 'nullable|string|max:50',
            'status' => 'required|in:active,inactive',
            'icon' => 'nullable|image|max:2048',
            'features' => 'nullable|array',
            'features.*.name' => 'required|string|max:255',
            'features.*.value' => 'nullable|string|max:255',
        ]);

        if ($request->hasFile('icon')) {
            $path = $request->file('icon')->store('packages', 'public');
            $validated['icon_path'] = asset('storage/' . $path);
        }

        $package = Package::create($validated);

        if (!empty($validated['features'])) {
            foreach ($validated['features'] as $feature) {
                $package->features()->create($feature);
            }
        }

        return response()->json($package->load('features'), 201);
    }

    public function update(Request $request, $id)
    {
        $package = Package::findOrFail($id);

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'discount_percent' => 'nullable|numeric|min:0|max:100',
            'validity_days' => 'required|integer|min:1',
            'order_index' => 'nullable|integer',
            'is_popular' => 'nullable|boolean',
            'badge_text' => 'nullable|string|max:50',
            'status' => 'required|in:active,inactive',
            'icon' => 'nullable|image|max:2048',
            'features' => 'nullable|array',
            'features.*.name' => 'required|string|max:255',
            'features.*.value' => 'nullable|string|max:255',
        ]);

        if ($request->hasFile('icon')) {
            if ($package->icon_path) {
                // Logic to delete old file if needed
            }
            $path = $request->file('icon')->store('packages', 'public');
            $validated['icon_path'] = asset('storage/' . $path);
        }

        $package->update($validated);

        if (isset($validated['features'])) {
            $package->features()->delete();
            foreach ($validated['features'] as $feature) {
                $package->features()->create($feature);
            }
        }

        return response()->json($package->load('features'));
    }

    public function destroy($id)
    {
        $pkg = Package::find($id);
        if (!$pkg) return response()->json(['message' => 'Paket tapılmadı'], 404);
        if ($pkg->icon_path && Storage::disk('public')->exists($pkg->icon_path)) {
            Storage::disk('public')->delete($pkg->icon_path);
        }
        $pkg->delete();
        return response()->json(null, 204);
    }
}
