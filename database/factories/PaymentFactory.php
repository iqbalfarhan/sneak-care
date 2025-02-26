<?php

namespace Database\Factories;

use App\Models\Bank;
use App\Models\Shop;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Payment>
 */
class PaymentFactory extends Factory
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
            'bank_id' => fake()->randomElement(Bank::pluck('id')),
            'name' => fake()->sentence(),
            'account_number' => fake()->e164PhoneNumber(),
        ];
    }
}
