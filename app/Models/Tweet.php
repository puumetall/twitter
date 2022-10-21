<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Tweet
 *
 * @property int $id
 * @property string|null $content
 * @property int $user_id
 * @property int|null $tweet_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read mixed $is_retweet
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Like[] $likes
 * @property-read int|null $likes_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Reply[] $replies
 * @property-read int|null $replies_count
 * @property-read Tweet|null $retweet
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Tag[] $tags
 * @property-read int|null $tags_count
 * @property-read \App\Models\User $user
 * @method static \Database\Factories\TweetFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Tweet newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Tweet newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Tweet query()
 * @method static \Illuminate\Database\Eloquent\Builder|Tweet whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tweet whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tweet whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tweet whereTweetId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tweet whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tweet whereUserId($value)
 * @mixin \Eloquent
 */
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
    public function setContentAttribute($value){

        $value = preg_replace('/#\w+/', '', $value);
        $this->attributes['content'] = trim($value);
    }
    public function tags(){
        return $this->belongsToMany(Tag::class);
    }
}
