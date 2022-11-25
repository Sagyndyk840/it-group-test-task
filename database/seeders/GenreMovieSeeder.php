<?php

namespace Database\Seeders;

use App\Models\Genre;
use App\Models\Movie;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GenreMovieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $movies = Movie::query()->get();
        $genres = Genre::query()->get();

        foreach ($movies as $movie) {
            $random = rand(1, 3);
            dump($random);

            for ($i = 0; $i < $random; $i++) {
                $movie->genres()->attach(rand(1, $genres->count()));
            }
        }
    }
}
