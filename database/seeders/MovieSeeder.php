<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Movie;
use App\Models\Genre;

class MovieSeeder extends Seeder
{
    public function run(): void
    {
        // Create lookup table records first
        $action = Genre::create(['name' => 'Action']);
        $animation = Genre::create(['name' => 'Animation']);
        $sciFi = Genre::create(['name' => 'Sci-Fi']);

        // Create movies using genre_id
        $movies = [
            [
                'title' => 'Avengers: Endgame',
                'genre_id' => $action->id,
                'rating' => 8.4,
                'is_available' => true,
                'release_year' => 2019,
            ],
            [
                'title' => 'Spider-Man: No Way Home',
                'genre_id' => $action->id,
                'rating' => 8.2,
                'is_available' => true,
                'release_year' => 2021,
            ],
            [
                'title' => 'Inside Out',
                'genre_id' => $animation->id,
                'rating' => 8.1,
                'is_available' => true,
                'release_year' => 2015,
            ],
            [
                'title' => 'Coco',
                'genre_id' => $animation->id,
                'rating' => 8.4,
                'is_available' => true,
                'release_year' => 2017,
            ],
            [
                'title' => 'Interstellar',
                'genre_id' => $sciFi->id,
                'rating' => 8.7,
                'is_available' => true,
                'release_year' => 2014,
            ],
            [
                'title' => 'The Lion King',
                'genre_id' => $animation->id,
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
