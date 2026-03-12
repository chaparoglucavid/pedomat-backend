<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BannerResource extends JsonResource
{
    public function toArray($request): array
    {
        $imageUrl = $this->image_path
            ? (str_starts_with($this->image_path, 'http') ? $this->image_path : asset('storage/' . ltrim($this->image_path, '/')))
            : null;

        return [
            'id' => $this->id,
            'title' => $this->title,
            'content' => $this->content,
            'image_path' => $this->image_path,
            'image_url' => $imageUrl,
            'link_url' => $this->link_url,
            'status' => $this->status,
            'position' => $this->position,
            'expires_at' => $this->expires_at,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
