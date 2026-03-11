<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     */
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'full_name' => $this->full_name,
            'email' => $this->email,
            'phone' => $this->phone,
            'birthdate' => $this->birthdate,
            'activity_status' => $this->activity_status ?? null,
            'system_status' => $this->system_status ?? null,
            'user_current_balance' => $this->user_current_balance ?? 0,
            'type' => $this->type,
            'active_orders_count' => $this->active_orders_count ?? $this->getActiveOrdersCountAttribute(),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
