<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PedCategoryResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     */
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'category_name' => $this->category_name,
            'reason_for_use' => $this->reason_for_use,
            'unit_price' => $this->unit_price,
            'status' => $this->status,
            'brand' => $this->whenLoaded('brand') ? [
                'id' => $this->brand->id,
                'name' => $this->brand->name,
            ] : null,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
