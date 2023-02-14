<?php

namespace App\Http\Controllers;

use App\Models\User_post;
use Illuminate\Http\Request;

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
        $user_posts = User_post::all()->sortByDesc('id');
        return view(
            'home',
            [
                'posts'=> $user_posts
            ]
        );
    }

    public function chatposts(Request $Request){

        $Request->validate([
            'user_comment'=> 'required',
            'user_image' => ['required', 'mimes:jpg,png,jpeg', 'max:5048'],
            'post_name' => 'required',
        ]);

        $imageNewName = time() . '.' . $Request->user_image->extension();
        $path = $Request->user_image->move(public_path('uploads'), $imageNewName);

        User_post::create([
            'post_caption'=>$Request->input('user_comment'),
            'post_image'=>$imageNewName,
            'poster_name'=>$Request->input('post_name'),
        ]);

        return back();

    }
}
