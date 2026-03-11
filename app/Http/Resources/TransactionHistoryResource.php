<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TransactionHistoryResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'user' => $this->user ? [
                'id' => $this->user->id,
                'full_name' => $this->user->full_name ?? null,
            ] : null,
            'transaction_number' => $this->transaction_number,
            'amount' => $this->amount,
            'payment_via' => $this->payment_via,
            'transaction_type' => $this->transaction_type,
            'order_id' => $this->order_id,
            'created_at' => $this->created_at,
        ];
    }
}
