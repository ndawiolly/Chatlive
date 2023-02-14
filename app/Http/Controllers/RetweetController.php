<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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

    public function retweetPost(Request $request){
        Retweet::create([
         ''
        ]);
    }
}
