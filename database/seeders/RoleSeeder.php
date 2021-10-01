<?php

namespace Database\Seeders;

use App\Models\AdminUser;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [
            [
                'name' => 'super admin',
                'guard_name' => 'admin',
            ],
            [
                'name' => 'admin',
                'guard_name' => 'admin',
            ],
        ];

        Role::insert($roles);

        $superadmin = AdminUser::where('email', 'superadmin@superadmin.com')->first();
        $admin = AdminUser::where('email', 'admin@admin.com')->first();

        DB::table('model_has_roles')->insert([
            [
                'role_id' => 1,
                'model_type' => 'App\Models\AdminUser',
                'model_id' => $superadmin->id,
            ],
            [
                'role_id' => 2,
                'model_type' => 'App\Models\AdminUser',
                'model_id' => $admin->id
            ]
        ]);

        $data = [];
        $i = 1; // roles count
        while ($i <= 2) {
            $j = 1; // permissions count
            while ($j <= 16) {
                $data[] = [
                    'role_id' => $i,
                    'permission_id' => $j,
                ];
                $j++;
            }
            $i++;
        }

        DB::table('role_has_permissions')->insert($data);
    }
}
