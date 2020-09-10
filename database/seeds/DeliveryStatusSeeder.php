<?php

use App\DeliveryStatus;
use Illuminate\Database\Seeder;

class DeliveryStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DeliveryStatus::create([
            'name' => 'Order Created',
            'icon' => 'pe-7s-note',
        ]);

        DeliveryStatus::create([
            'name' => 'In Transit for Collection',
            'icon' => 'pe-7s-albums',
        ]);

        DeliveryStatus::create([
            'name' => 'Arrived at Manila Hub',
            'icon' => 'pe-7s-map-marker',
        ]);

        DeliveryStatus::create([
            'name' => 'In Transit for Delivery',
            'icon' => 'pe-7s-car',
        ]);

        DeliveryStatus::create([
            'name' => 'In Transit for 2nd Attempt',
            'icon' => 'pe-7s-car',
        ]);

        DeliveryStatus::create([
            'name' => 'Delivered',
            'icon' => 'pe-7s-box2',
        ]);

        DeliveryStatus::create([
            'name' => 'Back to Sender',
            'icon' => 'pe-7s-back-2',
        ]);
    }
}
