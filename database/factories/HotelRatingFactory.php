<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\HotelRating>
 */
class HotelRatingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'hotel_id' => fake()->randomElement([1, 2, 3, 4, 5]),
            'user_id' => fake()->numberBetween(1,1000),
            'bintang' => fake()->numberBetween(1,5),
            'tanggal' => fake()->date(),
            'ulasan' => fake()->text(),
        ];
    }
}
