<?php

use App\Package;
use Illuminate\Database\Seeder;

class PackageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Package::create([
            'name' => 'Medium',
            'description' => 'This is a medium package',
            'amount' => 78,
            'max_weight' => 3
        ]);

        Package::create([
            'name' => 'Large',
            'description' => 'This is a large package',
            'amount' => 88,
            'max_weight' => 3
        ]);

        Package::create([
            'name' => 'Own Packaging',
            'description' => 'This is an own packaging',
            'amount' => 98,
            'max_weight' => 5,
        ]);
    }
}
