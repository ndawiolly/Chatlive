<?php

namespace App\Http\Controllers;

use App\Models\User_post;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function chatlive_index(){
        return view('/chatlive_index');
    }

   
}
