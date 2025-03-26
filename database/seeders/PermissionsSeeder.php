<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\PermissionRegistrar;

class PermissionsSeeder extends Seeder
{
    public function run()
    {
        // Reset cached roles and permissions
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        // Create default permissions
        Permission::create(['name' => 'list events']);
        Permission::create(['name' => 'view events']);
        Permission::create(['name' => 'create events']);
        Permission::create(['name' => 'update events']);
        Permission::create(['name' => 'delete events']);

        Permission::create(['name' => 'list eventorganizers']);
        Permission::create(['name' => 'view eventorganizers']);
        Permission::create(['name' => 'create eventorganizers']);
        Permission::create(['name' => 'update eventorganizers']);
        Permission::create(['name' => 'delete eventorganizers']);

        Permission::create(['name' => 'list eventregistrations']);
        Permission::create(['name' => 'view eventregistrations']);
        Permission::create(['name' => 'create eventregistrations']);
        Permission::create(['name' => 'update eventregistrations']);
        Permission::create(['name' => 'delete eventregistrations']);

        Permission::create(['name' => 'list eventrules']);
        Permission::create(['name' => 'view eventrules']);
        Permission::create(['name' => 'create eventrules']);
        Permission::create(['name' => 'update eventrules']);
        Permission::create(['name' => 'delete eventrules']);

        Permission::create(['name' => 'list eventtypes']);
        Permission::create(['name' => 'view eventtypes']);
        Permission::create(['name' => 'create eventtypes']);
        Permission::create(['name' => 'update eventtypes']);
        Permission::create(['name' => 'delete eventtypes']);

        Permission::create(['name' => 'list mainorganizers']);
        Permission::create(['name' => 'view mainorganizers']);
        Permission::create(['name' => 'create mainorganizers']);
        Permission::create(['name' => 'update mainorganizers']);
        Permission::create(['name' => 'delete mainorganizers']);

        Permission::create(['name' => 'list sponsers']);
        Permission::create(['name' => 'view sponsers']);
        Permission::create(['name' => 'create sponsers']);
        Permission::create(['name' => 'update sponsers']);
        Permission::create(['name' => 'delete sponsers']);

        // Create user role and assign existing permissions
        $currentPermissions = Permission::all();
        $userRole = Role::create(['name' => 'user']);
        $userRole->givePermissionTo($currentPermissions);

        // Create admin exclusive permissions
        Permission::create(['name' => 'list roles']);
        Permission::create(['name' => 'view roles']);
        Permission::create(['name' => 'create roles']);
        Permission::create(['name' => 'update roles']);
        Permission::create(['name' => 'delete roles']);

        Permission::create(['name' => 'list permissions']);
        Permission::create(['name' => 'view permissions']);
        Permission::create(['name' => 'create permissions']);
        Permission::create(['name' => 'update permissions']);
        Permission::create(['name' => 'delete permissions']);

        Permission::create(['name' => 'list users']);
        Permission::create(['name' => 'view users']);
        Permission::create(['name' => 'create users']);
        Permission::create(['name' => 'update users']);
        Permission::create(['name' => 'delete users']);

        // Create admin role and assign all permissions
        $allPermissions = Permission::all();
        $adminRole = Role::create(['name' => 'super-admin']);
        $adminRole->givePermissionTo($allPermissions);

        $user = \App\Models\User::whereEmail('admin@admin.com')->first();

        if ($user) {
            $user->assignRole($adminRole);
        }
    }
}
