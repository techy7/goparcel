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

        Permission::create([
          'name' => 'View User',
          'description' => 'View User allows to access the page of the users list.'
        ]);
        Permission::create([
          'name' => 'Add User',
          'description' => 'Add User allows to create/add user.'
        ]);
        Permission::create([
          'name' => 'Edit User',
          'description' => 'Edit User allows to update/edit user information.'
        ]);
        Permission::create([
          'name' => 'Delete User',
          'description' => 'Delete User allows to delete/remove user.'
        ]);
        Permission::create([
          'name' => 'View Pickup',
          'description' => 'View Pickup allows to access the page of the pickups list.'
        ]);
        Permission::create([
          'name' => 'Add Pickup',
          'description' => 'Add Pickup allows to create/add pickup.'
        ]);
        Permission::create([
          'name' => 'Edit Pickup',
          'description' => 'Edit Pickup allows to update/edit pickup information.'
        ]);
        Permission::create([
          'name' => 'Delete Pickup',
          'description' => 'Delete Pickup allows to delete/remove pickup.'
        ]);
        Permission::create([
          'name' => 'View Customer',
          'description' => 'View Customer allows to access the page of the customers list.'
        ]);
        Permission::create([
          'name' => 'Add Customer',
          'description' => 'Add Customer allows to create/add customer.'
        ]);
        Permission::create([
          'name' => 'Edit Customer',
          'description' => 'Edit Customer allows to update/edit customer information.'
        ]);
        Permission::create([
          'name' => 'Delete Customer',
          'description' => 'Delete Customer allows to delete/remove customer.'
        ]);

        $role = Role::create([
          'name' => 'Super Admin',
          'description' => 'Super Admin has the ability to manage the access of all the functions in the website.'
        ]);

        $role->givePermissionTo(Permission::all());

        $role = Role::create([
          'name' => 'User',
          'description' => 'User Roles have the access most of permissions in the website.'
        ]);

        $role->givePermissionTo([
          'View User',
          'Add User',
          'Edit User',
          'Delete User',
          'View Pickup',
          'Add Pickup',
          'Edit Pickup',
          'Delete Pickup',
          'View Customer',
          'Add Customer',
          'Edit Customer',
          'Delete Customer',
        ]);

        $role = Role::create([
          'name' => 'Customer',
          'description' => 'Customer Roles can only access the Customer account page.'
        ]);
        
        $role->givePermissionTo('View Customer');
    }
}
