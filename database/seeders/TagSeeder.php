<?php

namespace Database\Seeders;

use App\Models\Tag;
use App\Models\Tweet;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tags = Tag::factory(20)->create();
        $tweets = Tweet::all();
        foreach ($tweets as $tweet){
            $tweetTags = $tags->shuffle()->take(rand(0, 5));
            foreach ($tweetTags as $tag){
                $tweet->tags()->attach($tag);
            }
        }
    }
}
