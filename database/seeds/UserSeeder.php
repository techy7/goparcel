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
        $super = User::create([
            'username' => 'daviddeleon',
            'name' => 'David De Leon',
            'email' => 'david@techy7.com',
            'password' => bcrypt('987654321'),
            'email_verified_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        $role = Role::find(1);
        $super->assignRole($role);

        $super = User::create([
            'username' => 'arwinabatayo',
            'name' => 'Arwin Abatayo',
            'email' => 'arwin.abatayo@techy7.com',
            'password' => bcrypt('987654321'),
            'email_verified_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        $role = Role::find(1);
        $super->assignRole($role);

        $super = User::create([
            'username' => 'superadmin',
            'name' => 'Super Admin',
            'email' => 'superadmin@gmail.com',
            'password' => bcrypt('987654321'),
            'address' => 'Main St. 123',
            'city' => 'Quezon City',
            'state' => 'Metro Manila',
            'postal_code' =>  '1116',
            'country' => 'Philippines',
            'email_verified_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        $role = Role::find(1);
        $super->assignRole($role);

        $user = User::create([
            'username' => 'admin',
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('987654321'),
            'address' => 'Main St. 123',
            'city' => 'Quezon City',
            'state' => 'Metro Manila',
            'postal_code' =>  '1116',
            'country' => 'Philippines',
            'email_verified_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        $role = Role::find(2);
        $user->assignRole($role);

        $customer = User::create([
            'username' => 'customer',
            'email' => 'customer@gmail.com',
            'name' => 'John Doe',
            'm_number' => '09451260066',
            'password' => bcrypt('987654321'),
            'address' => 'Main St. 123',
            'city' => 'Quezon City',
            'state' => 'Metro Manila',
            'postal_code' =>  '1116',
            'country' => 'Philippines',
            'email_verified_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        $role = Role::find(3);
        $customer->assignRole($role);

        $customer2 = User::create([
            'username' => 'customer2',
            'email' => 'customer1@gmail.com',
            'name' => 'Roberta Buan',
            'm_number' => '09451236547',
            'password' => bcrypt('987654321'),
            'address' => 'Main St. 123',
            'city' => 'Las Pinas',
            'state' => 'Metro Manila',
            'postal_code' =>  '1116',
            'country' => 'Philippines',
            'email_verified_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        $role = Role::find(3);
        $customer2->assignRole($role);  

        $customer3 = User::create([
            'username' => 'customer3',
            'email' => 'customer3@gmail.com',
            'name' => 'William Criste ',
            'm_number' => '09451236545',
            'password' => bcrypt('987654321'),
            'address' => 'Main St. 123',
            'city' => 'Taguig',
            'state' => 'Metro Manila',
            'postal_code' =>  '1516',
            'country' => 'Philippines',
            'email_verified_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        $role = Role::find(3);
        $customer3->assignRole($role); 

        $customer4 = User::create([
            'username' => 'customer4',
            'email' => 'customer4@gmail.com',
            'name' => 'Angelica Hasta ',
            'm_number' => '09451236245',
            'password' => bcrypt('987654321'),
            'address' => 'Main St. 123',
            'city' => 'Pasay',
            'state' => 'Metro Manila',
            'postal_code' =>  '0516',
            'country' => 'Philippines',
            'email_verified_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        $role = Role::find(3);
        $customer4->assignRole($role);  

        $customer5 = User::create([
            'username' => 'customer5',
            'email' => 'customer5@gmail.com',
            'name' => 'Bart Acero',
            'm_number' => '09451246245',
            'password' => bcrypt('987654321'),
            'address' => 'Main St. 123',
            'city' => 'Pasig',
            'state' => 'Metro Manila',
            'postal_code' =>  '6416',
            'country' => 'Philippines',
            'email_verified_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        $role = Role::find(3);
        $customer5->assignRole($role); 
    }
}
