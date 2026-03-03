<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EquipmentSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('equipment')->insert([
            ['id' => 1, 'name' => 'Vélo de montagne', 'description' => 'Vélo tout-terrain', 'daily_price' => 35.00, 'category_id' => 4],
            ['id' => 2, 'name' => 'Casque de vélo', 'description' => 'Casque de protection homologué', 'daily_price' => 5.00, 'category_id' => 3],
            ['id' => 3, 'name' => 'Skis alpins', 'description' => 'Skis pour piste', 'daily_price' => 40.00, 'category_id' => 1],
            ['id' => 4, 'name' => 'Raquettes de tennis', 'description' => 'Raquette en graphite', 'daily_price' => 12.00, 'category_id' => 1],
            ['id' => 5, 'name' => 'Sac de randonnée', 'description' => 'Sac 40L', 'daily_price' => 8.00, 'category_id' => 2],
        ]);
    }
}
