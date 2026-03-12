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
        $packages = Package::with('features')->orderBy('created_at', 'desc')->get();
        return PackageResource::collection($packages);
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
            'discount_percent' => 'required|numeric|min:0|max:100',
            'validity_days' => 'required|integer|min:1',
            'status' => 'required|in:active,inactive',
            'icon' => 'nullable|image|max:4096',
            'features' => 'nullable|array',
            'features.*.name' => 'required_with:features|string|max:255',
            'features.*.value' => 'nullable|string|max:255',
        ]);

        $iconPath = null;
        if ($request->hasFile('icon')) {
            $iconPath = $request->file('icon')->store('packages', 'public');
        }

        $pkg = Package::create([
            'title' => $validated['title'],
            'description' => $validated['description'] ?? null,
            'price' => $validated['price'],
            'discount_percent' => $validated['discount_percent'],
            'validity_days' => $validated['validity_days'],
            'status' => $validated['status'],
            'icon_path' => $iconPath,
        ]);

        if (!empty($validated['features'])) {
            foreach ($validated['features'] as $f) {
                PackageFeature::create([
                    'package_id' => $pkg->id,
                    'name' => $f['name'],
                    'value' => $f['value'] ?? null,
                ]);
            }
        }

        return new PackageResource($pkg->load('features'));
    }

    public function update(Request $request, $id)
    {
        $pkg = Package::with('features')->find($id);
        if (!$pkg) return response()->json(['message' => 'Paket tapılmadı'], 404);

        $validated = $request->validate([
            'title' => 'sometimes|required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'sometimes|required|numeric|min:0',
            'discount_percent' => 'sometimes|required|numeric|min:0|max:100',
            'validity_days' => 'sometimes|required|integer|min:1',
            'status' => 'sometimes|required|in:active,inactive',
            'icon' => 'nullable|image|max:4096',
            'features' => 'nullable|array',
            'features.*.name' => 'required_with:features|string|max:255',
            'features.*.value' => 'nullable|string|max:255',
        ]);

        if ($request->hasFile('icon')) {
            if ($pkg->icon_path && Storage::disk('public')->exists($pkg->icon_path)) {
                Storage::disk('public')->delete($pkg->icon_path);
            }
            $pkg->icon_path = $request->file('icon')->store('packages', 'public');
        }

        foreach (['title','description','price','discount_percent','validity_days','status'] as $field) {
            if (isset($validated[$field])) $pkg->{$field} = $validated[$field];
        }
        $pkg->save();

        if (isset($validated['features'])) {
            // Reset features for simplicity
            $pkg->features()->delete();
            foreach ($validated['features'] as $f) {
                PackageFeature::create([
                    'package_id' => $pkg->id,
                    'name' => $f['name'],
                    'value' => $f['value'] ?? null,
                ]);
            }
        }

        return new PackageResource($pkg->load('features'));
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
