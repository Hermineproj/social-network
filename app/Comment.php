<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    public function commentable()
    {
        return $this->morphTo();
    }
    public function comments()
    {
        return $this->morphMany('App\Comment', 'commentable');
    }
       public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }

}
