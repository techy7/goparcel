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
            'pickup_date' => '2020-08-18 00:00:00',
            'sender_name' => 'David De Leon',
            'sender_phone' => '09451260066',
            'pickup_address' => '8 Estrella Street Barangay Sangandaan Project 8',
            'pickup_city' => 'Quezon City',
            'pickup_state' => 'Metro Manila',
            'pickup_postal_code' => '1115',
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
            'pickup_date' => '2020-08-09 00:00:00',
            'sender_name' => 'Jayson De Leon',
            'sender_phone' => '09451260066',
            'pickup_address' => '8 Estrella Street Barangay Sangandaan Project 8',
            'pickup_city' => 'Quezon City',
            'pickup_state' => 'Metro Manila',
            'pickup_postal_code' => '1117',
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
            'created_at' => '2020-08-12 00:00:00',
            'updated_at' => '2020-08-12 00:00:00'
        ]);
        PickupActivity::create([
            'pickup_id' => $largePickup->id,
            'delivery_status_id' => 2,
            'created_at' => '2020-08-14 00:00:00',
            'updated_at' => '2020-08-14 00:00:00'
        ]);
        PickupActivity::create([
            'pickup_id' => $largePickup->id,
            'delivery_status_id' => 3,
            'created_at' => '2020-08-15 00:00:00',
            'updated_at' => '2020-08-15 00:00:00'
        ]);
        PickupActivity::create([
            'pickup_id' => $largePickup->id,
            'delivery_status_id' => 4,
            'created_at' => '2020-08-16 00:00:00',
            'updated_at' => '2020-08-16 00:00:00'
        ]);

        // Own Packaging,
        $ownPickup = Pickup::create([
            'user_id' => 5,
            'pickup_date' => '2020-08-30 00:00:00',
            'sender_name' => 'Cosilet De Leon',
            'sender_phone' => '09451260066',
            'pickup_address' => '8 Estrella Street Barangay Sangandaan Project 8',
            'pickup_city' => 'Quezon City',
            'pickup_state' => 'Metro Manila',
            'pickup_postal_code' => '1118',
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
            'created_at' => '2020-08-18 00:00:00',
            'updated_at' => '2020-08-18 00:00:00'
        ]);
        PickupActivity::create([
            'pickup_id' => $ownPickup->id,
            'delivery_status_id' => 2,
            'created_at' => '2020-08-19 00:00:00',
            'updated_at' => '2020-08-19 00:00:00'
        ]);
        PickupActivity::create([
            'pickup_id' => $ownPickup->id,
            'delivery_status_id' => 3,
            'created_at' => '2020-08-20 00:00:00',
            'updated_at' => '2020-08-20 00:00:00'
        ]);
        PickupActivity::create([
            'pickup_id' => $ownPickup->id,
            'delivery_status_id' => 4,
            'created_at' => '2020-08-21 00:00:00',
            'updated_at' => '2020-08-21 00:00:00'
        ]);
        PickupActivity::create([
            'pickup_id' => $ownPickup->id,
            'delivery_status_id' => 5,
            'created_at' => '2020-08-22 00:00:00',
            'updated_at' => '2020-08-22 00:00:00'
        ]);
        PickupActivity::create([
            'pickup_id' => $ownPickup->id,
            'delivery_status_id' => 6,
            'created_at' => '2020-08-23 00:00:00',
            'updated_at' => '2020-08-23 00:00:00'
        ]);

         // Customer6 large,
        $customPickup1 = Pickup::create([
            'user_id' => 6,
            'pickup_date' => '2020-08-18 00:00:00',
            'sender_name' => 'Roberta Buan',
            'sender_phone' => '09451260066',
            'pickup_address' => '8 Estrella Street Barangay Sangandaan Project 8',
            'pickup_city' => 'Las Pinas',
            'pickup_state' => 'Metro Manila',
            'pickup_postal_code' => '1119',
            'pickup_country' => 'Philippines',
            'receiver_name' => 'Cosilet De Leon',
            'receiver_email' => 'cosilet@techy7.com',
            'receiver_phone' => '09274247730',
            'receiver_address' => '31 Garnet Street Pleasant Hill San Jose Del Monte Bulacan',
            'receiver_city' => 'Bulacan',
            'receiver_state' => 'Metro Manila',
            'receiver_postal_code' => '3023',
            'receiver_country' => 'Philippines',
            'package_id' => 2,
            'package_length' => 35,
            'package_width' => 36,
            'package_height' => 45,
            'package_amount' => 264.55,
            'tracking_number' => 'TRACKINGNUMBER1',
        ]);
        PickupActivity::create([
            'pickup_id' => $customPickup1->id,
            'delivery_status_id' => 1,
            'created_at' => '2020-08-13 00:00:00',
            'updated_at' => '2020-08-13 00:00:00'
        ]);
        PickupActivity::create([
            'pickup_id' => $customPickup1->id,
            'delivery_status_id' => 2,
            'created_at' => '2020-08-14 00:00:00',
            'updated_at' => '2020-08-14 00:00:00'
        ]);
        PickupActivity::create([
            'pickup_id' => $customPickup1->id,
            'delivery_status_id' => 3,
            'created_at' => '2020-08-15 00:00:00',
            'updated_at' => '2020-08-15 00:00:00'
        ]);
        PickupActivity::create([
            'pickup_id' => $customPickup1->id,
            'delivery_status_id' => 4,
            'created_at' => '2020-08-16 00:00:00',
            'updated_at' => '2020-08-16 00:00:00'
        ]);

         // Customer6 medium,
         $customPickup2 = Pickup::create([
            'user_id' => 6,
            'pickup_date' => '2020-08-20 00:00:00',
            'sender_name' => 'Roberta Buan',
            'sender_phone' => '09451260066',
            'pickup_address' => '8 Estrella Street Barangay Sangandaan Project 8',
            'pickup_city' => 'Las Pinas',
            'pickup_state' => 'Metro Manila',
            'pickup_postal_code' => '1120',
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
            'tracking_number' => 'TRACKINGNUMBER2',
        ]);
        PickupActivity::create([
            'pickup_id' => $customPickup2->id,
            'delivery_status_id' => 1,
            'created_at' => '2020-08-13 00:00:00',
            'updated_at' => '2020-08-13 00:00:00'
        ]);
        PickupActivity::create([
            'pickup_id' => $customPickup2->id,
            'delivery_status_id' => 2,
            'created_at' => '2020-08-14 00:00:00',
            'updated_at' => '2020-08-14 00:00:00'
        ]);


        // Customer7 Medium,
        $customPickup3 = Pickup::create([
            'user_id' => 7,
            'pickup_date' => '2020-08-30 00:00:00',
            'sender_name' => 'William Criste',
            'sender_phone' => '09451260066',
            'pickup_address' => '8 Estrella Street Barangay Sangandaan Project 8',
            'pickup_city' => 'Los Banos',
            'pickup_state' => 'Laguna',
            'pickup_postal_code' => '1121',
            'pickup_country' => 'Philippines',
            'receiver_name' => 'Cosilet De Leon',
            'receiver_email' => 'cosilet@techy7.com',
            'receiver_phone' => '09274247730',
            'receiver_address' => '31 Garnet Street Pleasant Hill San Jose Del Monte Bulacan',
            'receiver_city' => 'Bulacan',
            'receiver_state' => 'Metro Manila',
            'receiver_postal_code' => '3023',
            'receiver_country' => 'Philippines',
            'package_id' => 1,
            'package_length' => 35,
            'package_width' => 36,
            'package_height' => 45,
            'package_amount' => 264.55,
            'tracking_number' => 'TRACKINGNUMBER3',
        ]);
        PickupActivity::create([
            'pickup_id' => $customPickup3->id,
            'delivery_status_id' => 1,
            'created_at' => '2020-08-19 00:00:00',
            'updated_at' => '2020-08-19 00:00:00'
        ]);
        PickupActivity::create([
            'pickup_id' => $customPickup3->id,
            'delivery_status_id' => 2,
            'created_at' => '2020-08-25 00:00:00',
            'updated_at' => '2020-08-25 00:00:00'
        ]);
        PickupActivity::create([
            'pickup_id' => $customPickup3->id,
            'delivery_status_id' => 3,
            'created_at' => '2020-08-26 00:00:00',
            'updated_at' => '2020-08-26 00:00:00'
        ]);


         // Customer7 Own Packaging,
         $customPickup4 = Pickup::create([
            'user_id' => 7,
            'pickup_date' => '2020-08-30 00:00:00',
            'sender_name' => 'William Criste',
            'sender_phone' => '09451260066',
            'pickup_address' => '8 Estrella Street Barangay Sangandaan Project 8',
            'pickup_city' => 'Makati',
            'pickup_state' => 'Metro Manila',
            'pickup_postal_code' => '1122',
            'pickup_country' => 'Philippines',
            'receiver_name' => 'Cosilet De Leon',
            'receiver_email' => 'cosilet@techy7.com',
            'receiver_phone' => '09274247730',
            'receiver_address' => '31 Garnet Street Pleasant Hill San Jose Del Monte Bulacan',
            'receiver_city' => 'Bulacan',
            'receiver_state' => 'Metro Manila',
            'receiver_postal_code' => '3023',
            'receiver_country' => 'Philippines',
            'package_id' => 1,
            'package_length' => 35,
            'package_width' => 36,
            'package_height' => 45,
            'package_amount' => 264.55,
            'tracking_number' => 'TRACKINGNUMBER4',
        ]);
        PickupActivity::create([
            'pickup_id' => $customPickup4->id,
            'delivery_status_id' => 1,
            'created_at' => '2020-08-19 00:00:00',
            'updated_at' => '2020-08-19 00:00:00'
        ]);
        PickupActivity::create([
            'pickup_id' => $customPickup4->id,
            'delivery_status_id' => 2,
            'created_at' => '2020-08-25 00:00:00',
            'updated_at' => '2020-08-25 00:00:00'
        ]);
        PickupActivity::create([
            'pickup_id' => $customPickup4->id,
            'delivery_status_id' => 3,
            'created_at' => '2020-08-26 00:00:00',
            'updated_at' => '2020-08-26 00:00:00'
        ]);


        // Customer8 Own Packaging,
        $customPickup5 = Pickup::create([
            'user_id' => 8,
            'pickup_date' => '2020-08-24 00:00:00',
            'sender_name' => 'Angelica Hasta',
            'sender_phone' => '09451260066',
            'pickup_address' => '8 Estrella Street Barangay Sangandaan Project 8',
            'pickup_city' => 'Pasay',
            'pickup_state' => 'Metro Manila',
            'pickup_postal_code' => '1123',
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
            'tracking_number' => 'TRACKINGNUMBER5',
        ]);
        PickupActivity::create([
            'pickup_id' => $customPickup5->id,
            'delivery_status_id' => 1,
            'created_at' => '2020-08-19 00:00:00',
            'updated_at' => '2020-08-19 00:00:00'
        ]);


         // Customer9 Own Packaging,
         $customPickup6 = Pickup::create([
            'user_id' => 9,
            'pickup_date' => '2020-08-29 00:00:00',
            'sender_name' => 'Bart Acero',
            'sender_phone' => '09451260066',
            'pickup_address' => '8 Estrella Street Barangay Sangandaan Project 8',
            'pickup_city' => 'Pasay',
            'pickup_state' => 'Metro Manila',
            'pickup_postal_code' => '1124',
            'pickup_country' => 'Philippines',
            'receiver_name' => 'Cosilet De Leon',
            'receiver_email' => 'cosilet@techy7.com',
            'receiver_phone' => '09274247730',
            'receiver_address' => '31 Garnet Street Pleasant Hill San Jose Del Monte Bulacan',
            'receiver_city' => 'Pasig',
            'receiver_state' => 'Metro Manila',
            'receiver_postal_code' => '3023',
            'receiver_country' => 'Philippines',
            'package_id' => 3,
            'package_length' => 35,
            'package_width' => 36,
            'package_height' => 45,
            'package_amount' => 264.55,
            'tracking_number' => 'TRACKINGNUMBER6',
        ]);
        PickupActivity::create([
            'pickup_id' => $customPickup6->id,
            'delivery_status_id' => 1,
            'created_at' => '2020-08-19 00:00:00',
            'updated_at' => '2020-08-19 00:00:00'
        ]);

        PickupActivity::create([
            'pickup_id' => $customPickup6->id,
            'delivery_status_id' => 2,
            'created_at' => '2020-08-23 00:00:00',
            'updated_at' => '2020-08-23 00:00:00'
        ]);

    }
}
