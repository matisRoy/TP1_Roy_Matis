<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class EquipmentSportSeeder extends Seeder
{
    public function run(): void
    {
        $now = Carbon::now();

        DB::table('equipment_sports')->insert([
            ['equipment_id' => 1, 'sport_id' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['equipment_id' => 1, 'sport_id' => 5, 'created_at' => $now, 'updated_at' => $now],
            ['equipment_id' => 2, 'sport_id' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['equipment_id' => 2, 'sport_id' => 2, 'created_at' => $now, 'updated_at' => $now],
            ['equipment_id' => 3, 'sport_id' => 2, 'created_at' => $now, 'updated_at' => $now],
            ['equipment_id' => 4, 'sport_id' => 4, 'created_at' => $now, 'updated_at' => $now],
            ['equipment_id' => 5, 'sport_id' => 5, 'created_at' => $now, 'updated_at' => $now],
        ]);
    }
}
