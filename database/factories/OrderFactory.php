<?php

namespace Database\Factories;

use App\Models\Customer;
use App\Models\Discount;
use App\Models\Payment;
use App\Models\Shop;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
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
            'kasir_id' => fake()->randomElement(User::pluck('id')),
            'teknisi_id' => fake()->randomElement(User::pluck('id')),
            'payment_id' => fake()->randomElement(Payment::pluck('id')),
            'discount_id' => fake()->randomElement(Discount::pluck('id')),
            'customer_id' => fake()->randomElement(Customer::pluck('id')),
            'estimate_date' => fake()->date('Y-m-d'),
            'shipping_cost' => fake()->numberBetween(0, 10000),
            'total_pay' => fake()->numberBetween(0, 10000),
            'paid' => fake()->boolean(),
            'status' => fake()->randomElement(['draft', 'progress', 'done', 'complete', 'cancelled']),
        ];
    }
}
