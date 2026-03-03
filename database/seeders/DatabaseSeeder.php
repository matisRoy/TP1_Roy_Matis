<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Rental;
use App\Models\Review;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Seed des tables principales
        $this->call([
            SportsSeeder::class,
            CategoriesSeeder::class,
            EquipmentSeeder::class,
            EquipmentSportSeeder::class,
        ]);

        // Factories
        User::factory(20)->create();
        Rental::factory(50)->create();
        Review::factory(100)->create();
    }
}
