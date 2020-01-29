<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'user_id', 'body', 'title',
    ];

    public function user()
    {
        return $this->belongsTo('App\User','user_id');
    }

    public function comments()
    {
        return $this->morphMany('App\Comment', 'commentable');
    }
    public function likes()
    {
        return $this->morphMany('App\Like', 'likable');
    }
}
