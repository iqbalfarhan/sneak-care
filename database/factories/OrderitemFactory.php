<?php

namespace Database\Factories;

use App\Models\Order;
use App\Models\Service;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Orderitem>
 */
class OrderitemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'order_id' => fake()->randomElement(Order::pluck('id')),
            'name' => fake()->words(4, true),
            'service_id' => fake()->randomElement(Service::pluck('id')),
        ];
    }
}
