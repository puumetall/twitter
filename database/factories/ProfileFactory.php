<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Profile>
 */
class ProfileFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'bio' => fake()->text(160),
            'image' => 'https://picsum.photos/seed/'. fake()->uuid .'/96',
            'background' => 'https://picsum.photos/seed/'. fake()->uuid .'/1320/300',
            'color' => fake()->safeHexColor
        ];
    }
}
