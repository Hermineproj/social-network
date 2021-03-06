<?php

namespace App\Http\Controllers;

use App\Friend;
use App\Profile;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class ProfileController extends Controller
{
    public function index(){
        $user = Auth::user();
        $profile = $user->profile;
        return view('profile',compact('user','profile'));
    }


    public function edit_profile(Request $request){
    $user = Auth::user();
            $this->validate($request, [
                'email' => 'email',
                'gender' => 'required',
                'dob' => 'date',
//                'image' => 'required|image|mimes:jpg,jpeg,png,gif',
            ]);
        $fileName = null;
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $fileName = md5($file->getClientOriginalName() . time()) . "." . $file->getClientOriginalExtension();
            $file->move('./upload/img/', $fileName);
        }
        $profile = $user->profile;
        $profile->user_id = $request->id;
        $profile->country = $request->country;
        $profile->gender = $request->gender;
        $profile->dob = $request->dob;
        $profile->image = $fileName;
        $profile->save();
        return view('profile',compact('user','profile'));
    }


    public function delete_profile_image($id){
        $user_profile = Profile::find($id);
        $image = $user_profile->image;
//        $old_image = './upload/img/' .$image;
////        if (file_exists($old_image)) {
////            unlink($old_image);
////        }
        $user_profile->image = '';
        $user_profile->save();

        return back();
    }


    public function memberProfile($id){
        $member=User::find($id);
        $isFriend=$this->isFriend($id);
        if ( $isFriend){
            $friends=$member->friendOf()->get();
        }
        else{
            $friends='No Access!';
        }
        return view('memberProfile',['profile'=>$member->profile,'isFriend'=>$isFriend,'member'=>$member,'friendsOf'=>$friends]);
    }



    protected function isFriend($id){
        $user = Auth::user();
        $friend=Friend::where('friend_id', $id)
            ->where('user_id', $user->id)
            ->where('accept', 1)
            ->get();
        return ($friend->count())?true:false;
    }

}
