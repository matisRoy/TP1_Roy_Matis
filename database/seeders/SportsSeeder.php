<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SportsSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('sports')->insert([
            ['id' => 1, 'name' => 'Vélo'],
            ['id' => 2, 'name' => 'Ski'],
            ['id' => 3, 'name' => 'Natation'],
            ['id' => 4, 'name' => 'Tennis'],
            ['id' => 5, 'name' => 'Randonnée'],
        ]);
    }
}
