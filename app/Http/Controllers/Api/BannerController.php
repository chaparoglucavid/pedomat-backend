<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\BannerResource;
use App\Models\Banner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BannerController extends Controller
{
    public function index()
    {
        return BannerResource::collection(Banner::orderBy('created_at', 'desc')->get());
    }

    public function show($id)
    {
        $banner = Banner::find($id);
        if (!$banner) {
            return response()->json(['message' => 'Banner tapılmadı'], 404);
        }
        return new BannerResource($banner);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'nullable|string',
            'image' => 'required|image|max:4096',
            'link_url' => 'nullable|url|max:255',
            'status' => 'required|in:active,inactive',
            'position' => 'nullable|string|max:100',
            'expires_at' => 'nullable|date',
        ]);

        $path = $request->file('image')->store('banners', 'public');

        $banner = Banner::create([
            'title' => $validated['title'],
            'content' => $validated['content'] ?? null,
            'image_path' => $path,
            'link_url' => $validated['link_url'] ?? null,
            'status' => $validated['status'],
            'position' => $validated['position'] ?? null,
            'expires_at' => $validated['expires_at'] ?? null,
        ]);

        return new BannerResource($banner);
    }

    public function update(Request $request, $id)
    {
        $banner = Banner::find($id);
        if (!$banner) {
            return response()->json(['message' => 'Banner tapılmadı'], 404);
        }

        $validated = $request->validate([
            'title' => 'sometimes|required|string|max:255',
            'content' => 'nullable|string',
            'image' => 'sometimes|image|max:4096',
            'link_url' => 'nullable|url|max:255',
            'status' => 'sometimes|required|in:active,inactive',
            'position' => 'nullable|string|max:100',
            'expires_at' => 'nullable|date',
        ]);

        if ($request->hasFile('image')) {
            if ($banner->image_path && Storage::disk('public')->exists($banner->image_path)) {
                Storage::disk('public')->delete($banner->image_path);
            }
            $path = $request->file('image')->store('banners', 'public');
            $banner->image_path = $path;
        }

        if (isset($validated['title'])) $banner->title = $validated['title'];
        if (isset($validated['content'])) $banner->content = $validated['content'];
        if (isset($validated['link_url'])) $banner->link_url = $validated['link_url'];
        if (isset($validated['status'])) $banner->status = $validated['status'];
        if (isset($validated['position'])) $banner->position = $validated['position'];
        if (isset($validated['expires_at'])) $banner->expires_at = $validated['expires_at'];

        $banner->save();

        return new BannerResource($banner);
    }

    public function destroy($id)
    {
        $banner = Banner::find($id);
        if (!$banner) {
            return response()->json(['message' => 'Banner tapılmadı'], 404);
        }
        if ($banner->image_path && Storage::disk('public')->exists($banner->image_path)) {
            Storage::disk('public')->delete($banner->image_path);
        }
        $banner->delete();
        return response()->json(null, 204);
    }
}
