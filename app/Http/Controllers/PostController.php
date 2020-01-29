<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function create_post(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'body' => 'required'
        ]);
        // Create Post
        $post = new Post;
        $post->user_id = Auth::id();
        $post->title = $request->title;

        $post->body = $request->body;
        $post->save();

        return back();
    }
}
