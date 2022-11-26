<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Xylis\FakerCinema\Provider\Movie;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Movie>
 */
class MovieFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition ()
    {
        $this->faker->addProvider(new Movie($this->faker));
        $movieName = $this->faker->movie;

        return [
            'movie_name'   => $movieName,
            'slug'         => Str::slug($movieName),
            'movie_status' => $this->faker->randomElement([false, true]),

        ];
    }
}
