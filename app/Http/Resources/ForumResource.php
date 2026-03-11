<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\ForumCommentResource;

class ForumResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'user' => [
                'id' => $this->user->id,
                'full_name' => $this->user->full_name ?? null,
            ],
            'forum_subject' => $this->forum_subject,
            'forum_content' => $this->forum_content,
            'forum_status' => $this->forum_status,
            'comments' => \App\Http\Resources\ForumCommentResource::collection($this->whenLoaded('forum_comments')),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
