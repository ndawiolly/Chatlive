<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Likes extends Model
{
    use HasFactory;
    protected $table = "likes";
    protected $primary = "id";
    protected $fillable =[
        'user_id',
        'post_id',
    ];

    public function post() {
        return $this->belongsTo(User_post::class);
    }

    public function user() {
        return $this->belongsTo(User::class,'user_id','id');
    }

}
