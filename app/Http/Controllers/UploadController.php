<?php

namespace App\Http\Controllers;

use App\Profile;
use App\Upload;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UploadController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $user = Auth::user();
        return view('photos',compact('user'));
    }
    public function upload(Request $request){

        $user = Auth::user();

        $this->validate($request, [

            'file' => 'required|file|mimes:jpg,jpeg,png,gif',
        ]);

        if ($request->hasFile('file')) {
            $file = $request->file('file');

            $fileName = md5($file->getClientOriginalName() . time()) . "." . $file->getClientOriginalExtension();
            $file->move('./upload/img/', $fileName);

            $type = mime_content_type('./upload/img/' . $fileName);
        }
        $upload = new Upload();
        $upload->user_id = $user->id;
        $upload->file = $fileName;
        $upload->media_type =$type;
        $upload->save();
        return back();
    }
    public function delete_file($id){

        $user_file = Upload::find($id);
        $old_image = './upload/img/' .$user_file->file;
        if (file_exists($old_image)) {
            unlink($old_image);
        }
        $user_file->delete();
        return back();
    }
    public function profile_image($id){
        $user = Auth::user();
        $profile = $user->profile;
        $user_file = Upload::where('id',$id)->first();
        $profile->image = $user_file->file;
        $profile->save();
        return back();
    }

}
