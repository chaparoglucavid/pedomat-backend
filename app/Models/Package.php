<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'price',
        'discount_percent',
        'validity_days',
        'icon_path',
        'order_index',
        'is_popular',
        'badge_text',
        'status',
    ];

    public function features()
    {
        return $this->hasMany(PackageFeature::class);
    }

    public function userPackages()
    {
        return $this->hasMany(UserPackage::class);
    }
}
