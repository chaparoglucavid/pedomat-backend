<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

class ForumComments extends Model
{
    use HasFactory, Notifiable, SoftDeletes;

    protected $table = 'forum_comments';
    protected $fillable = [
        'user_id',
        'forum_id',
        'comment'
    ];

    public function forum()
    {
        return $this->belongsTo(Forum::class, 'forum_id', 'id');
    }
}
