<?php

namespace App\Http\Controllers;

use App\Like;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LikeController extends Controller
{
    public function like(Request $request)
    {

        $this->validate($request, [

        ]);

        $existing_like = Like::where('likable_id',$request->likable_id)->where('likable_type',$request->likable_type)->whereUserId(Auth::id())->first();


if (is_null($existing_like)) {
    Like::create([
        'likable_id' => $request->likable_id,
        'likable_type' => $request->likable_type,
        'user_id' => Auth::id()
    ]);
    return back();
} else {
    if (is_null($existing_like)) {
        return back();

    } else {
        return back();
    }

}
}
}
