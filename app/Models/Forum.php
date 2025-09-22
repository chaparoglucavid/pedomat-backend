<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

class Forum extends Model
{
    use HasFactory, Notifiable, SoftDeletes;

    protected $table = 'forums';
    protected $fillable = [
        'user_id',
        'forum_subject',
        'forum_content',
        'forum_status',
    ];

    public function forum_comments()
    {
        return $this->hasMany(ForumComments::class, 'forum_id', 'id');
    }


}
