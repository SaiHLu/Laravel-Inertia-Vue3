<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\AdminUser::create([
            'name' => 'Super Admin',
            'email' => 'superadmin@superadmin.com',
            'password' => bcrypt('123456'),
        ]);

        \App\Models\AdminUser::create([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => bcrypt('123456'),
        ]);
    }
}
