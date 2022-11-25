<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Xylis\FakerCinema\Provider\Movie;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Genre>
 */
class GenreFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition ()
    {
        $this->faker->addProvider(new Movie($this->faker));
        $movieGenre = $this->faker->unique()->movieGenre;
        return [
                'genre_name' => $movieGenre,
                'slug' => Str::slug($movieGenre),
        ];
    }
}
