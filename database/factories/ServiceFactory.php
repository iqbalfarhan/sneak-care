<?php

namespace Database\Factories;

use App\Models\Shop;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Service>
 */
class ServiceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'shop_id' => fake()->randomElement(Shop::pluck('id')),
            'name' => fake()->words(3, true),
            'description' => fake()->sentence(3, true),
            'price' => fake()->randomFloat(2, 10000, 100000),
        ];
    }
}
