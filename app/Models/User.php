<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        "username",
        'email',
        'password',
        "imagen"
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    //Un usuario para varios Posts
    public function posts(): HasMany
    {
        return $this->hasMany(Post::class);
    }

    //Un usuario tiene muchos comentarios
    public function comentarios()
    {
        return $this->hasMany(Comentario::class);
    }

    //Un usuario tiene muchos likes
    public function likes()
    {
        return $this->hasMany(Like::class);
    }

    //Almacenar seguidores de un usuario
    public function followers()
    {
        return $this->belongsToMany(User::class, "followers", "user_id", "follower_id");
    }
    //Almacenar los que seguimos
    public function following()
    {
        return $this->belongsToMany(User::class, "followers",  "follower_id", "user_id");
    }
}
