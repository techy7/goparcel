<?php

use Illuminate\Database\Seeder;

class PickupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Mediu,
        Pickup::create([
            'id' => 1,
            'user_id' => 5,

            'pickup_date' => Carbon::now()->format('Y-m-d H:i:s'),
            'pickup_address' => '8 Estrella Street Barangay Sangandaan Project 8',
            'pickup_city' => 'Quezon City',
            'pickup_state' => 'Metro Manila',
            'pickup_postal_code' => '1116',
            'pickup_country' => 'Philippines',
            'receiver_name' => 'David Jayson De Leon',
            'receiver_email' => 'david@techy7.com',
            'receiver_phone' => '09274247730',

            'receiver_address' => '31 Garnet Street Pleasant Hill San Jose Del Monte Bulacan',
            'receiver_city' => 'Bulacan',
            'receiver_state' => 'Metro Manila',
            'receiver_postal_code' => '3023',
            'receiver_country' => 'Philippines',

            'package_id' => '1';
            #$table->float('package_length');
            #$table->float('package_width');
            #$table->float('package_height');
            #$table->float('package_amount');
        ]);
    }
}
