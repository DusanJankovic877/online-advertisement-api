<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Advertisement>
 */
class AdvertisementFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title' => fake()->text(50),
            'description' => fake()->text(100),
            'image_url' => fake()->imageUrl($width = 640, $height = 480, 'cats', true, 'Faker', true),
            'price' => fake()->numberBetween(10,50),
            'category' => fake()->word(),
            'user_id' => fake()->numberBetween(1,10),
            'city' => fake()->word()
        ];
    }
}
