<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Movie;

class MovieSeeder extends Seeder
{
    public function run(): void
    {
        $movies = [
            [
                'title' => 'Avengers: Endgame',
                'genre' => 'Action',
                'rating' => 8.4,
                'is_available' => true,
                'release_year' => 2019,
            ],
            [
                'title' => 'Spider-Man: No Way Home',
                'genre' => 'Action',
                'rating' => 8.2,
                'is_available' => true,
                'release_year' => 2021,
            ],
            [
                'title' => 'Inside Out',
                'genre' => 'Animation',
                'rating' => 8.1,
                'is_available' => true,
                'release_year' => 2015,
            ],
            [
                'title' => 'Coco',
                'genre' => 'Animation',
                'rating' => 8.4,
                'is_available' => true,
                'release_year' => 2017,
            ],
            [
                'title' => 'Interstellar',
                'genre' => 'Sci-Fi',
                'rating' => 8.7,
                'is_available' => true,
                'release_year' => 2014,
            ],
            [
                'title' => 'The Lion King',
                'genre' => 'Animation',
                'rating' => 8.5,
                'is_available' => true,
                'release_year' => 2019,
            ],
        ];

        foreach ($movies as $movie) {
            Movie::create($movie);
        }
    }
}
