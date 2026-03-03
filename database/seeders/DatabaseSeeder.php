<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Rental;
use App\Models\Review;
use App\Models\Sport;
use App\Models\Equipment;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            SportsSeeder::class,
            CategoriesSeeder::class,
            EquipmentSeeder::class,
            EquipmentSportSeeder::class,
        ]);

        User::factory(20)->create();

        $sports = Sport::all(); // on prend les sports déjà seedés
        $equipment = Equipment::all();

        foreach ($sports as $sport) {
            $equipmentSports = $equipment->random(2);
            $sport->equipments()->attach($equipmentSports->pluck('id')->toArray());
        }

        Rental::factory(50)->create();
        Review::factory(100)->create();
    }
}
