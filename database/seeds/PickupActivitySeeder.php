<?php

use Illuminate\Database\Seeder;

class PickupActivitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PickupActivity::create([
            'status' => 'Arrived',
        ]);

        PickupActivity::create([
            'status' => 'Pickup',
        ]);

        PickupActivity::create([
            'status' => 'Delivered',
        ]);
    }
}
