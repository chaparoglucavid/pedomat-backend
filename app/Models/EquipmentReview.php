<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

class EquipmentReview extends Model
{
    use HasFactory, Notifiable, SoftDeletes;

    protected $table = 'equipment_reviews';
    protected $fillable = [
        'equipment_id',
        'user_id',
        'order_id',
        'rating',
        'note'
    ];

    public function equipment()
    {
        return $this->belongsTo(Equipments::class, 'equipment_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function order()
    {
        return $this->belongsTo(Orders::class, 'order_id');
    }

}
