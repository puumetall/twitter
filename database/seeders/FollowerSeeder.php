<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FollowerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = User::all();
        foreach ($users as $user){
            $followers = $users->shuffle()->take(rand(0, $users->count()));
            foreach ($followers as $follower){
                if($follower->id !== $user->id){
                    $user->followers()->attach($follower);
                }
            }
        }
    }
}
