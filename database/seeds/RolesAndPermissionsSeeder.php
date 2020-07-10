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

        // Permission::create([
        //   'name' => 'View User',
        //   'description' => 'View User allows to access the page of the users list.'
        // ]);
        // Permission::create([
        //   'name' => 'Add User',
        //   'description' => 'Add User allows to create/add user.'
        // ]);
        // Permission::create([
        //   'name' => 'Edit User',
        //   'description' => 'Edit User allows to update/edit user information.'
        // ]);
        // Permission::create([
        //   'name' => 'Delete User',
        //   'description' => 'Delete User allows to delete/remove user.'
        // ]);
        // Permission::create([
        //   'name' => 'View Lesson',
        //   'description' => 'View Lesson allows to access the page of the lessons list.'
        // ]);
        // Permission::create([
        //   'name' => 'Add Lesson',
        //   'description' => 'Add Lesson allows to create/add lesson.'
        // ]);
        // Permission::create([
        //   'name' => 'Edit Lesson',
        //   'description' => 'Edit Lesson allows to update/edit lesson information.'
        // ]);
        // Permission::create([
        //   'name' => 'Delete Lesson',
        //   'description' => 'Delete Lesson allows to delete/remove lesson.'
        // ]);
        // Permission::create([
        //   'name' => 'View Student',
        //   'description' => 'View Student allows to access the page of the students list.'
        // ]);
        // Permission::create([
        //   'name' => 'Add Student',
        //   'description' => 'Add Student allows to create/add student.'
        // ]);
        // Permission::create([
        //   'name' => 'Edit Student',
        //   'description' => 'Edit Student allows to update/edit student information.'
        // ]);
        // Permission::create([
        //   'name' => 'Delete Student',
        //   'description' => 'Delete Student allows to delete/remove student.'
        // ]);


        $role = Role::create([
          'name' => 'Super Admin',
        //   'description' => 'Super Admin has the ability to manage the access of all the functions in the website.'
        ]);

        $role->givePermissionTo(Permission::all());

        $role = Role::create([
          'name' => 'User',
        //   'description' => 'User Roles have the access most of permissions in the website.'
        ]);

        // $role->givePermissionTo([
        //   'View User',
        //   'Add User',
        //   'Edit User',
        //   'Delete User',
        //   'View Lesson',
        //   'Add Lesson',
        //   'Edit Lesson',
        //   'Delete Lesson',
        //   'View Student',
        //   'Add Student',
        //   'Edit Student',
        //   'Delete Student',
        // ]);

        $role = Role::create([
          'name' => 'Customer',
        //   'description' => 'Student Roles can only access the Lesson Page.'
        ]);
        
        // $role->givePermissionTo('View Lesson');
    }
}
