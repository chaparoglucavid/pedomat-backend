<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PackageResource extends JsonResource
{
    public function toArray($request): array
    {
        $iconUrl = $this->icon_path
            ? (str_starts_with($this->icon_path, 'http') ? $this->icon_path : asset('storage/' . ltrim($this->icon_path, '/')))
            : null;

        return [
            'id' => $this->id,
            'title' => $this->title,
            'description' => $this->description,
            'price' => $this->price,
            'discount_percent' => $this->discount_percent,
            'validity_days' => $this->validity_days,
            'icon_path' => $this->icon_path,
            'icon_url' => $iconUrl,
            'status' => $this->status,
            'features' => PackageFeatureResource::collection($this->whenLoaded('features')),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
