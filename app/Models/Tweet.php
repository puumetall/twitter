<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tweet extends Model
{
    use HasFactory;

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function replies(){
        return $this->hasMany(Reply::class);
    }

    public function likes(){
        return $this->hasMany(Like::class);
    }

    public function getIsRetweetAttribute(){
        return $this->tweet_id !== null;
    }

    public function retweet(){
        return $this->hasOne(Tweet::class, 'id', 'tweet_id');
    }
}
