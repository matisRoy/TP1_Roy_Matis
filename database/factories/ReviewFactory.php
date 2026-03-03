<?php

namespace Database\Factories;

use App\Models\Review;
use App\Models\User;
use App\Models\Rental;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Review>
 */
class ReviewFactory extends Factory
{
    protected $model = Review::class;

    public function definition(): array
    {
        return [
            'user_id' => User::inRandomOrder()->first()->id,
            'rental_id' => Rental::inRandomOrder()->first()->id,
            'rating' => $this->faker->numberBetween(1, 10),
            'comment' => $this->faker->sentence(),
        ];
    }
}
