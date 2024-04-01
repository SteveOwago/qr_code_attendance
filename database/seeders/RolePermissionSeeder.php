<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        Permission::create(['name' => 'admin_management']);
        Permission::create(['name' => 'user_management']);
        Permission::create(['name' => 'scan_codes']);
        Permission::create(['name' => 'user_own_code']);
        Permission::create(['name' => 'profile_management']);
        Permission::create(['name' => 'reports_management']);
        Permission::create(['name' => 'assign_permissions']);

        $roleAdmin = Role::create(['name' => 'Admin']);
        $roleClient = Role::create(['name' => 'Client']);

        $roleAdmin->givePermissionTo(Permission::all());
        $roleClient->givePermissionTo(['user_own_code','profile_management']);
    }
}
