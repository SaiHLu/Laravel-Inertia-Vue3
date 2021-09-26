<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            [
                'name' => 'get adminuser',
                'guard_name' => 'admin',
            ],
            [
                'name' => 'create adminuser',
                'guard_name' => 'admin',
            ],
            [
                'name' => 'edit adminuser',
                'guard_name' => 'admin',
            ],
            [
                'name' => 'delete adminuser',
                'guard_name' => 'admin',
            ],
            [
                'name' => 'get role',
                'guard_name' => 'admin',
            ],
            [
                'name' => 'create role',
                'guard_name' => 'admin',
            ],
            [
                'name' => 'edit role',
                'guard_name' => 'admin',
            ],
            [
                'name' => 'delete role',
                'guard_name' => 'admin',
            ],
            [
                'name' => 'get user',
                'guard_name' => 'admin',
            ],
            [
                'name' => 'create user',
                'guard_name' => 'admin',
            ],
            [
                'name' => 'edit user',
                'guard_name' => 'admin',
            ],
            [
                'name' => 'delete user',
                'guard_name' => 'admin',
            ],
        ];

        Permission::insert($permissions);
    }
}
