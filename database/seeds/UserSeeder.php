<?php

use App\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = User::create([
            'id' => 1,
            'username' => 'daviddeleon',
            'name' => 'David De Leon',
            'email' => 'david@techy7.com',
            'password' => bcrypt('123456789'),
            'email_verified_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        $role = Role::find(1);
        $admin->assignRole($role);

        $admin = User::create([
                'id' => 2,
                'username' => 'arwinabatayo',
                'name' => 'Arwin Abatayo',
                'email' => 'arwin.abatayo@techy7.com',
                'password' => bcrypt('123456789'),
                'email_verified_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        $role = Role::find(1);
        $admin->assignRole($role);

        $admin = User::create([
                'id' => 3,
                'username' => 'superadmin',
                'name' => 'Super Admin',
                'email' => 'superadmin@gmail.com',
                'password' => bcrypt('123456789'),
                'email_verified_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        $role = Role::find(1);
        $admin->assignRole($role);

        $user = User::create([
                'id' => 4,
                'username' => 'admin',
                'name' => 'Admin',
                'email' => 'admin@gmail.com',
                'password' => bcrypt('123456789'),
                'email_verified_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        $role = Role::find(2);
        $user->assignRole($role);

        $student = User::create([
                'id' => 5,
                'username' => 'customer',
                'email' => 'customer@gmail.com',
                'name' => 'John Doe',
                'm_number' => '09451260066',
                'password' => bcrypt('123456789'),
                'city' => 'Quezon City',
                'state' => 'Metro Manila',
                'postal_code' =>  '1116',
                'country' => 'Philippines',
                'email_verified_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        $role = Role::find(3);
        $student->assignRole($role);
    }
}
