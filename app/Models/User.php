<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'username',
        'email',
        'password',
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

    public function tweets(){
        return $this->hasMany(Tweet::class);
    }

    public function replies(){
        return $this->hasMany(Reply::class);
    }

    public function likes(){
        return $this->hasMany(Like::class);
    }

    public function profile(){
        return $this->hasOne(Profile::class);
    }
    public function followers(){
        return $this->belongsToMany(User::class, 'followers', 'followee_id', 'follower_id', 'id', 'id', 'users');
    }
    public function followees(){
        return $this->belongsToMany(User::class, 'followers', 'follower_id', 'followee_id', 'id', 'id', 'users');
    }
    public function getAuthIsFollowingAttribute(){
        return $this->followers()->where('follower_id', Auth::user()->id)->exists();
    }
}
