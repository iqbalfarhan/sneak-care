<?php

namespace Database\Seeders;

use App\Models\Orderitem;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OrderitemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Orderitem::factory(40)->create();
    }
}
