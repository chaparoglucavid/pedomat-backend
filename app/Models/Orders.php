<?php

namespace App\Models;

use App\Services\BarcodeService;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

class Orders extends Model
{
    use HasFactory, SoftDeletes, Notifiable;
    protected $table = 'orders';
    protected $fillable = [
        'user_id',
        'equipment_id',
        'order_number',
        'order_qty_sum',
        'order_amount_sum',
        'invoice',
        'payment_method',
        'payment_status',
        'barcode',
        'barcode_status',
        'barcode_expiry_time',
        'order_status'
    ];

    protected static function booted()
    {
        static::creating(function ($order) {
            $orderCode = 'ORD-'.time();
            $barcodeService = app(BarcodeService::class);
            $order->order_number = $orderCode;
            $order->barcode = $barcodeService->generateBarcode($orderCode);
        });
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function equipment()
    {
        return $this->belongsTo(Equipments::class, 'equipment_id', 'id');
    }

    public function order_details()
    {
        return $this->hasMany(OrderDetails::class, 'order_id', 'id');
    }


    public function equipment_reviews()
    {
        return $this->hasMany(EquipmentReview::class, 'order_id', 'id');
    }
}
