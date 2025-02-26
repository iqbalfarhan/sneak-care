<?php

namespace Database\Factories;

use App\Models\Shop;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Discount>
 */
class DiscountFactory extends Factory
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
            'name' => $this->faker->words(2, true),
            'description' => $this->faker->text(100),
            'type' => $this->faker->randomElement(['percent', 'amount']),
            'value' => $this->faker->numberBetween(1, 100),
        ];
    }
}
