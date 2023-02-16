<?php

use App\Http\Controllers\CommentsController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LikesController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\RetweetController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


// index chat page
Route::get('/', [PagesController::class, 'chatlive_index'])->name('chat_index');
// send data
Route::post('/userpost', [HomeController::class, 'chatposts'])->name('post');

// authentication of user
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::post('/addComment/{id}', [CommentsController::class, 'addComment'])->where('id','[0-9]+')->name('create_comment');
Route::post('/addLikes/{id}', [LikesController::class, 'addLikes'])->where('id','[0-9]+')->name('like_post');
Route::post('/retweet/{id}', [RetweetController::class, 'retweetPost'])->where('id', '[0-9]+')->name('retweet_post');
