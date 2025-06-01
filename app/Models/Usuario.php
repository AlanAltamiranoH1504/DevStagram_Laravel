<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;
use Illuminate\Testing\Fluent\Concerns\Has;

class Usuario extends Model
{
    //
    protected $table = "Usuarios";
    protected $fillable = ["nombre", "userName", "email", "password"];

    //Hasheo de passwords
    public function setPasswordAttribute($password)
    {
        $this->attributes["password"] = Hash::needsRehash($password) ? Hash::make($password) : $password;
    }
}
