<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Friend;
class UserController extends Controller
{
    public function members(){
        $user = auth()->user();
        $friend_list=null;
        if($user) {
            $members = User::where("id", "!=", $user->id)->get();
            //dd($members[2]->friendOf);
            $friend_list = $user->friends()->pluck('accept', 'friend_id')->all();
        }
        return view('members',['members'=>$members,'friend_list'=> $friend_list,'user'=>$user]);
    }



    public function sendFriendRequestTo($id)
    {
        $friendr=User::where('id',$id)->first();
        if($friendr){
           $user_id=Auth::user()->id;
           //dd($friendr->id);
            $friend_id= $friendr->id;
            $friend=new Friend();
            $friend->user_id=$user_id;
            $friend->friend_id=$friend_id;
            $friend->save();
            return back();
   }
        else{
          abort(404);
        }
    }

    public function removeFriend($id)
    {      $user_id=Auth::user()->id;
            Friend::where(['user_id'=>$user_id,'friend_id'=>$id])->delete();
            Friend::where(['user_id'=>$id,'friend_id'=>$user_id])->delete();
            return back();
    }


    public function friendRequests(){
        $user = auth()->user();
        $friend_requests=Friend::where('friend_id',$user->id)
            ->where('accept', 0)
            ->get();
        $request_senders=[];
        foreach ($friend_requests as $request){
            $request_senders[]=User::find($request->user_id);
        }
        return view('friend-requests',['requests'=>$friend_requests,'senders'=>$request_senders]);
    }


    public function acceptFriendRequest($id){
        $user = auth()->user();
        $request = Friend::where('friend_id',$user->id)
            ->where('user_id', $id)->first();
        $request->accept = 1;
        $request->save();
        $friend=new Friend();
        $friend->user_id=$user->id;
        $friend->friend_id=$id;
        $friend->accept=1;
        $friend->save();
        return back()->with('success', 'Friend Request Accepted!');
    }



    public function denyFriendRequest($id){
        $user = auth()->user();
        $request = Friend::where('friend_id',$user->id)
            ->where('user_id', $id)->first();
        $request1 = Friend::where('friend_id',$id)
            ->where('user_id', $user->id)->first();
        //$request->accept = 1;
        $request->delete();
        $request1->delete();
        return with('success', 'Friend Request Denied!');;
    }


}
