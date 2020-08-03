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
        ]);

        DeliveryStatus::create([
            'name' => 'In Transit for Collection',
        ]);

        DeliveryStatus::create([
            'name' => 'Arrived at Manila Hub',
        ]);

        DeliveryStatus::create([
            'name' => 'In Transit for Delivery',
        ]);

        DeliveryStatus::create([
            'name' => 'Delivered',
        ]);

        DeliveryStatus::create([
            'name' => 'Back to Sender',
        ]);
    }
}
