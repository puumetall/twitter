<?php

namespace Database\Seeders;

use App\Models\Tweet;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TweetSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = User::all();
        $tweets = Tweet::factory(100)->make();
        $tweets = $tweets->sortBy('created_at');
        foreach($tweets as $tweet){
            $tweet->user_id = $users->random()->id;
            $tweet->save();
        }
    }
}
