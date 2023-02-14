<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User_post extends Model
{
    use HasFactory;
    protected $table = "user_posts";
    protected $primary = "id";
    protected $fillable =
    [
        'post_caption',
        'post_image',
        'poster_name',

    ];

    protected $hidden = [
        "id"
    ];

    public function comments() {
        return $this->hasMany(Comments::class,'post_id');
    }
    public function likes() {
        return $this->hasMany(Likes::class,'post_id');
    }
}
