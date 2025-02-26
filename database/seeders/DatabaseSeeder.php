<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            RoleSeeder::class,
            PermissionSeeder::class,

            ShopSeeder::class,

            BankSeeder::class,
            UserSeeder::class,

            CustomerSeeder::class,
            PaymentSeeder::class,
            ServiceSeeder::class,
            DiscountSeeder::class,
        ]);
    }
}
