<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Friend;
use App\Message;
use Illuminate\Support\Facades\Auth;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function friends()
{
    return $this->belongsToMany('App\User', 'friends', 'user_id', 'friend_id');
}

    function friendsOfMine()
    {
        return $this->belongsToMany('App\User', 'friends', 'user_id', 'friend_id')
            // if you want to rely on accepted field, then add this:
            ->wherePivot('accept', '=', 1);
    }

    function friendOf()
    {
        return $this->belongsToMany('App\User', 'friends', 'friend_id', 'user_id')
            ->wherePivot('accept', '=', 1)
            ->withPivot('accept');
    }

      public function messages(){
        return $this->hasMany('App\Message');
      }


    public function posts()
    {
        return $this->hasMany('App\Post');
    }

    public function profile()
    {
        return $this->hasOne('App\Profile');
    }

    public function files()
    {
        return $this->hasMany('App\Upload');
    }

    public function comments()
    {
        return $this->hasMany('App\Comment');
    }
}
