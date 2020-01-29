<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Upload extends Model
{
    protected $fillable = [
        'user_id', 'post_id','name','media_type',
    ];

    public function user()
    {
        return $this->belongsTo('App\User','user_id');
    }
}
