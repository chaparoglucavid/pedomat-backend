<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class EquipmentsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'equipment_number' => $this->equipment_number,
            'equipment_name' => $this->equipment_name,
            'general_capacity' => $this->general_capacity,
            'battery_level' => $this->battery_level,
            'current_address' => $this->current_address,
            'longitude' => $this->longitude,
            'latitude' => $this->latitude,
            'equipment_status' => $this->equipment_status,
            'current_ped_count' => $this->ped_categories()->sum('qty_available')
        ];
    }
}
