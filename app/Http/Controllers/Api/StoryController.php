<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Story;
use App\Http\Resources\StoryResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;

class StoryController extends Controller
{
    public function index()
    {
        $stories = Story::orderBy('created_at', 'desc')->get();
        return StoryResource::collection($stories);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'expiration_date_time' => 'required|date',
            'status' => 'required|in:active,expired',
        ]);

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('stories', 'public');
            $validated['image'] = $path;
        }

        $story = Story::create($validated);

        return new StoryResource($story);
    }

    public function show($id)
    {
        $story = Story::findOrFail($id);
        return new StoryResource($story);
    }

    public function update(Request $request, $id)
    {
        $story = Story::findOrFail($id);

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'nullable|string',
            'image' => 'nullable', // Can be file or string (existing path)
            'expiration_date_time' => 'required|date',
            'status' => 'required|in:active,expired',
        ]);

        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($story->image && !filter_var($story->image, FILTER_VALIDATE_URL)) {
                Storage::disk('public')->delete($story->image);
            }
            $path = $request->file('image')->store('stories', 'public');
            $validated['image'] = $path;
        } else {
            // Keep existing image if no new file is uploaded
            unset($validated['image']);
        }

        $story->update($validated);

        return new StoryResource($story);
    }

    public function destroy($id)
    {
        $story = Story::findOrFail($id);
        
        if ($story->image) {
            Storage::disk('public')->delete($story->image);
        }
        
        $story->delete();

        return response()->json(['message' => 'Hekayə silindi']);
    }
}
