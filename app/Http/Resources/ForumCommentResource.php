<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ForumCommentResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'user' => [
                'id' => $this->user->id,
                'full_name' => $this->user->full_name ?? null,
            ],
            'content' => $this->content ?? $this->comment ?? null,
            'created_at' => $this->created_at,
        ];
    }
}
