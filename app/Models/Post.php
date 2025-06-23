<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //
    use HasFactory;

    protected $table = "posts";
    protected $fillable = [
        "title",
        "description",
        "imagen",
        "user_id"
    ];

    //Un post pertenece a un usuario
    public function user() {
        return $this->belongsTo(User::class, "user_id");
    }

    //Un post tiene muchos comentarios
    public function comentarios()
    {
        return $this->hasMany(Comentario::class);
    }

    //Un post tiene muchos likes
    public function likes()
    {
        return $this->hasMany(Like::class);
    }
}
