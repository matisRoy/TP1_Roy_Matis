<?php

namespace Database\Factories;

use App\Models\Rental;
use App\Models\User;
use App\Models\Equipment;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Rental>
 */
class RentalFactory extends Factory
{
    protected $model = Rental::class;

    public function definition(): array
    {
        $start = $this->faker->dateTimeBetween('-30 days', 'now');

        return [
            'user_id' => User::inRandomOrder()->first()->id,
            'equipment_id' => Equipment::inRandomOrder()->first()->id,
            'start_date' => $start->format('Y-m-d'),
            'end_date' => $this->faker->dateTimeBetween($start, '+14 days')->format('Y-m-d'),
            'total_price' => rand(1, 1000000000),
        ];
    }
}
