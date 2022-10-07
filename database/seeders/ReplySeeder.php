<?php

namespace Database\Seeders;

use App\Models\Reply;
use App\Models\Tweet;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ReplySeeder extends Seeder
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
           $replies = Reply::factory(rand(0,10))->make(['tweet_id' => $tweet->id]);
           foreach ($replies as $reply){
               $reply->user_id = $users->random()->id;
               $reply->save();
           }

        }
    }
}
