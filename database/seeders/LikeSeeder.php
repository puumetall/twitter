<?php

namespace Database\Seeders;

use App\Models\Like;
use App\Models\Reply;
use App\Models\Tweet;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LikeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tweets = Tweet::all();
        $users = User::all();
        foreach($tweets as $tweet){
            $likes = Like::factory(rand(0,$users->count()))->make(['tweet_id' => $tweet->id]);
            $users = $users->shuffle();
            foreach ($likes as $key => $like){
                $like->user_id = $users[$key]->id;
                $like->save();
            }

        }
    }
}
