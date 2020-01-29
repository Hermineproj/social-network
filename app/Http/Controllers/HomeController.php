<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Post;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function main_page()
    {
       $user = User::all();
        $posts = Post::orderBy('created_at', 'desc')->get();
        return view('main',compact('posts','user'));
    }
    public function user_page()
    {
        $user = Auth::user();
        $posts = Post::where('user_id',$user->id)->get();
        return view('index',compact('posts','user'));
    }
}
