<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class UserPackage extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'package_id',
        'start_date',
        'end_date',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function package()
    {
        return $this->belongsTo(Package::class);
    }

    public function scopeActive($query)
    {
        return $query->where('status', 'active')->whereDate('end_date', '>=', Carbon::today());
    }
}
