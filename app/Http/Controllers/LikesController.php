<?php

namespace App\Http\Controllers;

use App\Models\Likes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LikesController extends Controller
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

    public function addLikes(Request $request, $id)
    {
        // $request->validate([
        //     'user_likes'=> ['required', 'integer']
        // ]);

        $like = Likes::where('user_id','=',Auth::user()->id)->where('post_id',$id)->get();

        if($like->count() < 1){
            Likes::create([
                'user_id' => Auth::user()->id,
                'post_id' => $id,
            ]);
        }else{
            Likes::where('user_id','=',Auth::user()->id)->where('post_id',$id)->delete();
        }
        // $like = Likes::create([
        //     'user_id' => Auth::user()->id,
        //     'post_id' => $id,
        // ]);
        return back();
    }
}
