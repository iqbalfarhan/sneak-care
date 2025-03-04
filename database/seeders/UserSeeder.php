<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::factory()->create([
            "name" => "Iqbal farhan syuhada",
            "email" => "iqbalfarhan1996@gmail.com",
            "password" => "adminoke",
        ]);
        $user->assignRole("superadmin");

        // $user = User::factory()->create([
        //     "name" => "User Contoh",
        //     "email" => "user@gmail.com",
        //     "password" => "user",
        // ]);
        // $user->assignRole("kasir");

        // User::factory(10)
        //     ->create()
        //     ->each(fn($user) => $user->assignRole(fake()->randomElement(['kasir', 'teknisi'])));
    }
}
