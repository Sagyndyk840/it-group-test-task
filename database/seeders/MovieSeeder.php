<?php

namespace Database\Seeders;

use App\Models\Movie;
use Faker\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MovieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run ()
    {
        $movies = Movie::factory()
            ->count(40)
            ->create();

        foreach ($movies as $movie) {
            $movie
                ->addMediaCollection('movies')
                ->useFallbackUrl('/images/default/def.jpg')
                ->useFallbackPath(public_path('/images/default/def.jpg'));;
        }
    }
}
