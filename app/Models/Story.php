<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Story extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'stories';

    protected $fillable = [
        'title',
        'content',
        'image',
        'expiration_date_time',
        'status'
    ];

    protected $casts = [
        'expiration_date_time' => 'datetime',
    ];
}
