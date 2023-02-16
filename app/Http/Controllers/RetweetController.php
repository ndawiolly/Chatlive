<?php

namespace App\Http\Controllers;

use App\Models\Retweet;
use App\Models\User_post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RetweetController extends Controller
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

    public function store($id){
    }

    public function retweetPost(Request $request, $id){
        $post = User_post::findOrFail($id);
        $post = Retweet::where('user_id','=',Auth::user()->id)->where('post_id',$id)->get();
        if($post->count() < 1){
        Retweet::create([
            'post_id'=> $id,
            'user_id'=> Auth::user()->id,
        ]);
        }else{
            Retweet::where('user_id','=',Auth::user()->id)->where('post_id',$id)->delete();
        }

        return back();
    }
}
