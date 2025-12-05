<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => \App\Models\User::inRandomOrder()->first()->id ?? 1,
            'title' => $this->faker->words(3, true),
            'description' => $this->faker->words(10, true),
            'price' => $this->faker->randomFloat(2, 1, 99),
            'ingredients' => $this->faker->words(3),
            'benefits' => $this->faker->words(3),
            'images' => [
                'https://picsum.photos/400/400?random=' . $this->faker->numberBetween(1, 1000)
            ],
        ];
    }
}
