<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comentario extends Model
{
    protected $table = "comentarios";
    protected $fillable = ["post_id", "user_id", "comentario"];

    public function user() {
        return $this->belongsTo(User::class, "user_id");
    }
    public function post()
    {
        return $this->belongsTo(Post::class, "post_id");
    }
}
