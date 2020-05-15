<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Message;
use Illuminate\Support\Facades\Auth;
use App\Friend;
use App\Profile;

class MessageController extends Controller
{

    public function index(){
    $current_user=Auth::user();
    $messages=Message::where('user_id', $current_user->id)
        ->orWhere('receiver_id', $current_user->id)
        ->get();
    $friends = $current_user->friendsOfMine;
    //dd($messages);
    return view('Messages.index',['messages'=>$messages,'cuser'=>Auth::user()->name,'friends'=>$friends]);
    }



    public function create($id){
        $friend=User::find($id);
        return view('sendmessage',['friend'=>$friend]);
    }


    public function store(Request $request){
        $validatedData = $request->validate([
//            'title' => 'required|unique:posts|max:255',
            'body' => 'required',
            'receiver_id'=>'required'
        ]);
        $data=$request->all();
        $data['user_id']=Auth::user()->id;
       Message::create($data);
       return back()->with('success', 'message success!');
    }



        public function incomeMessagesAjax(Request $request){
            $income_mess_user_id = $request->input('id');
            $income_mess_user=User::find($income_mess_user_id);
            $income_mess_user_image=$income_mess_user->profile->image;
            $current_user=Auth::user();
            $messages=Message::where('user_id', $current_user->id)
                ->orWhere('receiver_id', $income_mess_user_id)
                ->where('user_id', $income_mess_user_id)
                ->orWhere('receiver_id', $current_user->id)
                ->get();
         //return $income_mess_user_id;
            return response()->json(['success'=>'Got Simple Ajax Request.','messages'=>$messages,'current_user_id'=>$current_user->id,'msg_user_name'=>$income_mess_user->name,'msg_user_image'=>$income_mess_user_image]);
        }



}
