<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FriendController extends Controller
{
    public function index(){
        $user=Auth::user();
        $friends=$user->friendsOfMine()->get();
        return view('friends',['friends'=>$friends]);
    }

//public function friendProfile($id){
//
//}


}
