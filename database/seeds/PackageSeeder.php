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
            'description' => 'Medium description.',
            'amount' => 78,
        ]);
        
        Package::create([
            'name' => 'Large',
            'description' => 'Large description.',
            'amount' => 88,
        ]);
        
        Package::create([
            'name' => 'Own Packaging',
            'description' => 'Own Packaging description.',
            'amount' => 98,
        ]);
    }
}
