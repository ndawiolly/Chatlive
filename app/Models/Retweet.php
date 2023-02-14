<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Retweet extends Model
{
    use HasFactory;
    protected $table= 'retweets';
    protected $primary = 'id';
    protected $fillable = [
        'id',
        'post_id',
        'poster_name',
        'retweet_post'
    ];

    public function post() {
        return $this->belongsTo(User_post::class);
    }

    public function user() {
        return $this->belongsTo(User::class,'user_id','id');
    }
}
