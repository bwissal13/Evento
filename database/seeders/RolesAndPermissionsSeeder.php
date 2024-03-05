<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesAndPermissionsSeeder extends Seeder
{
    public function run()
    {
        // Create roles
        $adminRole = Role::create(['name' => 'admin']);
        $organizerRole = Role::create(['name' => 'organizer']);
        $userRole = Role::create(['name' => 'user']);

        // Create permissions
        $manageUsersPermission = Permission::create(['name' => 'manage users']);
        $createEventPermission = Permission::create(['name' => 'create event']);
        // ... add more permissions as needed

        // Assign permissions to roles
        $adminRole->givePermissionTo($manageUsersPermission, $createEventPermission);
        $organizerRole->givePermissionTo($createEventPermission);
    }
}
