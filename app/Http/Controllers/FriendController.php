<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FriendController extends Controller
{
    public function index(){
        $friends=Auth::user()->friends;
        return view('friends',['friends'=>$friends]);
    }
    public function sendFriendRequestTo($id){

    }

    public function acceptFriendRequest($id){

    }

    public function denyFriendRequest($id){

    }


}
