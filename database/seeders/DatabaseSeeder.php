<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $user = new User();
        $user->name = env('DEFAULT_USER_NAME', 'User McUser');
        $user->username = env('DEFAULT_USER_USERNAME', 'mcuser');
        $user->email = env('DEFAULT_USER_EMAIL', 'user@email.com');
        $user->password = bcrypt(env('DEFAULT_USER_PASSWORD', 'password'));
        $user->save();
        $this->call(UserSeeder::class);
        $this->call(FollowerSeeder::class);
        $this->call(ProfileSeeder::class);
        $this->call(TweetSeeder::class);
        $this->call(ReplySeeder::class);
        $this->call(LikeSeeder::class);


        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
