<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Reply>
 */
class ReplyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $created = fake()->dateTimeBetween('-10 years', 'now');
        $updated = fake()->dateTimeBetween($created, 'now');
        if(rand(0,4)) {
            $updated = $created;
        }
        return [
            'content' => fake()->text(280),
            'created_at' => $created,
            'updated_at' => $updated,
        ];
    }
}
