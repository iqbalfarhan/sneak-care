<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $datas = [
            'superadmin',
            'owner',
            'kasir',
            'teknisi',
        ];

        foreach ($datas as $name) {
            Role::updateOrCreate([
                'name' => $name,
            ]);
        }
    }
}
