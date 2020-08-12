<?php

use App\Pickup;
use Carbon\Carbon;
use App\PickupActivity;
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
        $mediumPickup = Pickup::create([
            'user_id' => 5,
            'pickup_date' => Carbon::now()->format('Y-m-d H:i:s'),
            'sender_name' => 'David De Leon',
            'sender_phone' => '09451260066',
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
            'package_amount' => 78,
            'tracking_number' => 'PB5F22DC3FEF84E',
        ]);
        PickupActivity::create([
            'pickup_id' => $mediumPickup->id,
            'delivery_status_id' => 1,
            'created_at' => '2020-08-04 00:00:00',
            'updated_at' => '2020-08-04 00:00:00'
        ]);
        PickupActivity::create([
            'pickup_id' => $mediumPickup->id,
            'delivery_status_id' => 2,
            'created_at' => '2020-08-05 00:00:00',
            'updated_at' => '2020-08-05 00:00:00'
        ]);

        // Large,
        $largePickup = Pickup::create([
            'user_id' => 5,
            'pickup_date' => Carbon::now()->format('Y-m-d H:i:s'),
            'sender_name' => 'Jayson De Leon',
            'sender_phone' => '09451260066',
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
            'package_amount' => 88,
            'tracking_number' => 'PB5F22DCF0239D7',
        ]);
        PickupActivity::create([
            'pickup_id' => $largePickup->id,
            'delivery_status_id' => 1,
            'created_at' => '2020-08-04 00:00:00',
            'updated_at' => '2020-08-04 00:00:00'
        ]);
        PickupActivity::create([
            'pickup_id' => $largePickup->id,
            'delivery_status_id' => 2,
            'created_at' => '2020-08-05 00:00:00',
            'updated_at' => '2020-08-05 00:00:00'
        ]);
        PickupActivity::create([
            'pickup_id' => $largePickup->id,
            'delivery_status_id' => 3,
            'created_at' => '2020-08-06 00:00:00',
            'updated_at' => '2020-08-06 00:00:00'
        ]);
        PickupActivity::create([
            'pickup_id' => $largePickup->id,
            'delivery_status_id' => 4,
            'created_at' => '2020-08-07 00:00:00',
            'updated_at' => '2020-08-07 00:00:00'
        ]);

        // Own Packaging,
        $ownPickup = Pickup::create([
            'user_id' => 5,
            'pickup_date' => Carbon::now()->format('Y-m-d H:i:s'),
            'sender_name' => 'Cosilet De Leon',
            'sender_phone' => '09451260066',
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
            'package_length' => 35,
            'package_width' => 36,
            'package_height' => 45,
            'package_amount' => 264.55,
            'tracking_number' => 'PB5F22DD0779AE6',
        ]);
        PickupActivity::create([
            'pickup_id' => $ownPickup->id,
            'delivery_status_id' => 1,
            'created_at' => '2020-08-04 00:00:00',
            'updated_at' => '2020-08-04 00:00:00'
        ]);
        PickupActivity::create([
            'pickup_id' => $ownPickup->id,
            'delivery_status_id' => 2,
            'created_at' => '2020-08-05 00:00:00',
            'updated_at' => '2020-08-05 00:00:00'
        ]);
        PickupActivity::create([
            'pickup_id' => $ownPickup->id,
            'delivery_status_id' => 3,
            'created_at' => '2020-08-06 00:00:00',
            'updated_at' => '2020-08-06 00:00:00'
        ]);
        PickupActivity::create([
            'pickup_id' => $ownPickup->id,
            'delivery_status_id' => 4,
            'created_at' => '2020-08-07 00:00:00',
            'updated_at' => '2020-08-07 00:00:00'
        ]);
        PickupActivity::create([
            'pickup_id' => $ownPickup->id,
            'delivery_status_id' => 5,
            'created_at' => '2020-08-08 00:00:00',
            'updated_at' => '2020-08-08 00:00:00'
        ]);
        PickupActivity::create([
            'pickup_id' => $ownPickup->id,
            'delivery_status_id' => 6,
            'created_at' => '2020-08-09 00:00:00',
            'updated_at' => '2020-08-09 00:00:00'
        ]);
    }
}
