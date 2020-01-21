<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FriendController extends Controller
{
    public function friend()
    {
       return view('friends') ;
    }
}
