<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class DefaultPermissionSeeder extends Seeder
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
                'name'         => 'manage_user',
                'display_name' => 'Manage User',
            ],
            [
                'name'         => 'manage_roles',
                'display_name' => 'Manage Roles',
            ],
        ];
        foreach ($permissions as $permission) {
            Permission::create($permission);
        }
    }
}
