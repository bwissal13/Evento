<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesAndPermissionsSeeder extends Seeder
{
    public function run()
    {
        // Check if the role exists before creating
        $adminRole = Role::where('name', 'admin')->first();

        // Create the role if it doesn't exist
        if (!$adminRole) {
            $adminRole = Role::create(['name' => 'admin']);
        }

        // Check if permissions exist before creating
        $manageUsersPermission = Permission::where('name', 'manage users')->first();
        $manageCategoriesPermission = Permission::where('name', 'manage categories')->first();
        $manageEventsPermission = Permission::where('name', 'manage events')->first();
        $validateEventsPermission = Permission::where('name', 'validate events')->first();
        $viewStatisticsPermission = Permission::where('name', 'view statistics')->first();

        // Create permissions if they don't exist
        if (!$manageUsersPermission) {
            $manageUsersPermission = Permission::create(['name' => 'manage users']);
        }

        // ... (Repeat the same logic for other permissions)

        // Assign permissions to roles
        $adminRole->givePermissionTo(
            $manageUsersPermission,
            $manageCategoriesPermission,
            $manageEventsPermission,
            $validateEventsPermission,
            $viewStatisticsPermission
        );

        // ... (Assign permissions to other roles)

        // Note: Add more permissions as needed based on the project requirements
    }
}

