<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function members(){
        $cuser=Auth::user()->id;
        $members=User::where("id","!=",$cuser)->get();
        return view('members',['members'=>$members]);
    }
//    public function getFullName()
//    {
//        return $this->first_name . ' ' . $this->last_name;
//    }



//    public function addFriend(User $user)
//    {
//        $this->friends()->attach($user->id);
//    }


//    public function removeFriend(User $user)
//    {
//        $this->friends()->detach($user->id);
//    }
}
