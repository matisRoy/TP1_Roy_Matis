<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('categories')->insert([
            ['id' => 1, 'name' => 'Équipement principal'],
            ['id' => 2, 'name' => 'Accessoire'],
            ['id' => 3, 'name' => 'Protection'],
            ['id' => 4, 'name' => 'Véhicule'],
        ]);
    }
}
