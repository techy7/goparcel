<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        $role = Role::create([
            'name' => 'Super Admin',
        ]);
        $role->givePermissionTo(Permission::all());

        $role = Role::create([
            'name' => 'User',
        ]);

        $role = Role::create([
            'name' => 'Customer',
        ]);
    }
}
