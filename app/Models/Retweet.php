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
        'post_id',
        'user_id',
    ];

    public function post() {
        return $this->hasOne(User_post::class,'id','post_id');
    }

    public function user() {
        return $this->hasOne(User::class,'id', 'user_id');
    }
}
