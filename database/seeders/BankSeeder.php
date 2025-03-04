<?php

namespace Database\Seeders;

use App\Models\Bank;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BankSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $banks = [
            ['name' => 'Bank BNI'],
            ['name' => 'Bank BSI'],
            ['name' => 'Bank BRI'],
            ['name' => 'Bank Mandiri'],
            ['name' => 'E-Wallet LinkAja'],
            ['name' => 'E-Wallet Dana'],
            ['name' => 'E-Wallet OVO'],
            ['name' => 'E-Wallet GoPay'],
        ];

        foreach ($banks as $bank) {
            Bank::create($bank);
        }
    }
}
