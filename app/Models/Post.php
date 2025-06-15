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
}
