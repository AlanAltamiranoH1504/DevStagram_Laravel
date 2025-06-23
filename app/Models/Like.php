<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    //
    protected $table = "likes";
    protected $fillable = ["user_id", "post_id"];

    //Un like pertenece a un usuario
    public function user()
    {
        $this->belongsTo(User::class, "user_id");
    }

    //Un like pertenece un post
    public function post()
    {
        $this->belongsTo(Post::class, "post_id");
    }
}
