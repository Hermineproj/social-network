<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Message;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
{

    public function index(){
        $current_user=Auth::user()->id;
        $messages=Message::where('user_id', $current_user)
            ->orWhere('receiver_id', $current_user)
            ->get();
        return view('Messages.index',['messages'=>$messages,'cuser'=>Auth::user()->name]);
    }

    public function create($id){
        $friend=User::find($id);
        return view('sendmessage',['friend'=>$friend]);
    }

    public function store(Request $request){
        $validatedData = $request->validate([
            'title' => 'required|unique:posts|max:255',
            'body' => 'required',
            'receiver_id'=>'required'
        ]);
        $data=$request->all();
        $data['user_id']=Auth::user()->id;
       Message::create($data);
       return back()->with('success', 'message success!');
    }

    public function incomeMessages(){

    }



}
