<?php

use App\Type;
use Illuminate\Database\Seeder;

class TypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Type::create([
            'name' => 'Clothes',
        ]);

        Type::create([
            'name' => 'Food',
        ]);
    }
}
