<?php

namespace App\Http\Controllers;

use App\Models\Comments;
use Illuminate\Http\Request;

class CommentsController extends Controller
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

    public function addComment(Request $request, $id)
    {
        $request->validate([
            'comment'=> ['required', 'string']
        ]);

        $comment = Comments::create([
            'post_id' => $id,
            'comment' => $request->comment
        ]);
        return back();
    }
}
