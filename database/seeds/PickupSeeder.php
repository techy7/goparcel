<?php

use App\Pickup;
use Carbon\Carbon;
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
        // Medium,
        Pickup::create([
            'user_id' => 5,
            'pickup_date' => Carbon::now()->format('Y-m-d H:i:s'),
            'pickup_address' => '8 Estrella Street Barangay Sangandaan Project 8',
            'pickup_city' => 'Quezon City',
            'pickup_state' => 'Metro Manila',
            'pickup_postal_code' => '1116',
            'pickup_country' => 'Philippines',
            'receiver_name' => 'David De Leon',
            'receiver_email' => 'david@techy7.com',
            'receiver_phone' => '09274247730',
            'receiver_address' => '31 Garnet Street Pleasant Hill San Jose Del Monte Bulacan',
            'receiver_city' => 'Bulacan',
            'receiver_state' => 'Metro Manila',
            'receiver_postal_code' => '3023',
            'receiver_country' => 'Philippines',
            'package_id' => 1,
            'package_length' => 0,
            'package_width' => 0,
            'package_height' => 0,
            'package_amount' => 0,
        ]);

        // Large,
        Pickup::create([
            'user_id' => 5,
            'pickup_date' => Carbon::now()->format('Y-m-d H:i:s'),
            'pickup_address' => '8 Estrella Street Barangay Sangandaan Project 8',
            'pickup_city' => 'Quezon City',
            'pickup_state' => 'Metro Manila',
            'pickup_postal_code' => '1116',
            'pickup_country' => 'Philippines',
            'receiver_name' => 'Jayson De Leon',
            'receiver_email' => 'jayson@techy7.com',
            'receiver_phone' => '09274247730',
            'receiver_address' => '31 Garnet Street Pleasant Hill San Jose Del Monte Bulacan',
            'receiver_city' => 'Bulacan',
            'receiver_state' => 'Metro Manila',
            'receiver_postal_code' => '3023',
            'receiver_country' => 'Philippines',
            'package_id' => 2,
            'package_length' => 0,
            'package_width' => 0,
            'package_height' => 0,
            'package_amount' => 0,
        ]);

        // Own Packaging,
        Pickup::create([
            'user_id' => 5,
            'pickup_date' => Carbon::now()->format('Y-m-d H:i:s'),
            'pickup_address' => '8 Estrella Street Barangay Sangandaan Project 8',
            'pickup_city' => 'Quezon City',
            'pickup_state' => 'Metro Manila',
            'pickup_postal_code' => '1116',
            'pickup_country' => 'Philippines',
            'receiver_name' => 'Cosilet De Leon',
            'receiver_email' => 'cosilet@techy7.com',
            'receiver_phone' => '09274247730',
            'receiver_address' => '31 Garnet Street Pleasant Hill San Jose Del Monte Bulacan',
            'receiver_city' => 'Bulacan',
            'receiver_state' => 'Metro Manila',
            'receiver_postal_code' => '3023',
            'receiver_country' => 'Philippines',
            'package_id' => 3,
            'package_length' => 2,
            'package_width' => 2,
            'package_height' => 2,
            'package_amount' => 154,
        ]);
    }
}
