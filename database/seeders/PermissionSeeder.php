<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $datas = [
            'user.index'            => ['kasir'],
            'user.create'           => ['kasir'],
            'user.edit'             => ['kasir'],
            'user.delete'           => ['kasir'],
            'user.resetpassword'    => ['kasir'],
            'user.setactive'        => ['kasir'],
            'home'                  => ['teknisi', 'kasir'],
            'about'                 => ['teknisi', 'kasir'],
            'profile'               => ['teknisi', 'kasir'],
            'database'              => [],
            'role.index'            => [],
            'role.create'           => [],
            'role.edit'             => [],
            'role.delete'           => [],
            'role.setpermission'    => [],
            'permission.index'      => [],
            'permission.create'     => [],
            'permission.edit'       => [],
            'permission.delete'     => [],
        ];

        foreach ($datas as $data => $roles) {
            $permission = Permission::updateOrCreate(['name' => $data]);

            if (count($roles) > 0) {
                foreach ($roles as $role) {
                    $permission->assignRole($role);
                }
            }
        }
    }
}
