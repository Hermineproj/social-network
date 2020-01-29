<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $fillable = [
        'title','body','user_id','receiver_id',
    ];

    public function user(){
        return $this->belongsTo('App\User');
    }

}
