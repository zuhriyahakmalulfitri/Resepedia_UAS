<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    

    protected $guarded = ['id'];

    public function scopeFilter($query, array $filters)
    {
        if(isset($filters['keyword3']) ? $filters['keyword3'] : false){
            return $query->where('username', 'like', '%' . $filters['keyword3'] . '%');
        }
    }

    protected $attributes = [
        'photo' => 'user-photos/chef.png',
        'about' => 'Hi everybody',
        'isAdmin' => false,
        'isVerified' => false,
   ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function posts()
    {
        return $this->hasMany(Post::class);
    }
}
