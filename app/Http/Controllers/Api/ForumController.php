<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ForumResource;
use App\Http\Resources\ForumCommentResource;
use App\Models\Forum;
use Illuminate\Http\Request;

class ForumController extends Controller
{

    public function index()
    {
        $forums = Forum::with(['user', 'forum_comments.user'])->orderBy('created_at', 'desc')->paginate(15);
        return ForumResource::collection($forums);
    }

    public function show($id)
    {
        $forum = Forum::with(['user', 'forum_comments.user'])->findOrFail($id);
        return new ForumResource($forum);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'forum_subject' => 'required|string|max:255',
            'forum_content' => 'required|string',
        ]);

        $user = $request->user();

        $forum = Forum::create(array_merge($validated, ['user_id' => $user->id]));

        return (new ForumResource($forum))->response()->setStatusCode(201);
    }

    public function update(Request $request, $id)
    {
        $forum = Forum::findOrFail($id);

        // simple ownership check: only owner can update (adjust for admin roles if needed)
        if ($request->user()->id !== $forum->user_id) {
            return response()->json(['message' => 'Unauthorized'], 403);
        }

        $validated = $request->validate([
            'forum_subject' => 'required|string|max:255',
            'forum_content' => 'required|string',
            'forum_status' => 'nullable|in:pending,accepted,rejected',
        ]);

        $forum->update($validated);

        return new ForumResource($forum);
    }

    public function destroy(Request $request, $id)
    {
        $forum = Forum::findOrFail($id);

        if ($request->user()->id !== $forum->user_id) {
            return response()->json(['message' => 'Unauthorized'], 403);
        }
        $forum->delete();

        return response()->json(['message' => 'Forum deleted'], 200);
    }

    // optional: add comment to forum
    public function comment(Request $request, $id)
    {
        $forum = Forum::findOrFail($id);

        $validated = $request->validate([
            'content' => 'required|string',
        ]);

        // ForumComments table uses 'comment' column
        $comment = $forum->forum_comments()->create([
            'user_id' => $request->user()->id,
            'comment' => $validated['content'],
        ]);

        return (new ForumCommentResource($comment->load('user')))->response()->setStatusCode(201);
    }
}
