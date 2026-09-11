<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MovieController extends Controller
{
    private function getMovies()
    {
        return [
            ['id' => 1, 'title' => 'Avengers: Endgame', 'genre' => 'Action', 'rating' => 8.4],
            ['id' => 2, 'title' => 'Spider-Man: No Way Home', 'genre' => 'Action', 'rating' => 8.2],
            ['id' => 3, 'title' => 'Inside Out', 'genre' => 'Animation', 'rating' => 8.1],
            ['id' => 4, 'title' => 'Coco', 'genre' => 'Animation', 'rating' => 8.4],
            ['id' => 5, 'title' => 'Interstellar', 'genre' => 'Sci-Fi', 'rating' => 8.7],
            ['id' => 6, 'title' => 'The Lion King', 'genre' => 'Animation', 'rating' => 8.5],
        ];
    }

    public function index()
    {
        $movies = $this->getMovies();

        return view('movies.index', ['movies' => $movies]);
    }
    public function show($id)
    {
        $movies = $this->getMovies();

        if (!isset($movies[$id - 1])) {
            abort(404);
        }
        $movies = $movies[$id - 1];
        return view('movies.show', ['movie' => $movies]);
    }
    public function featured()
    {
        $movies = $this->getMovies();
        $featuredMovie = $movies[0];
        return view('movies.featured', ['movie' => $featuredMovie]);
    }
    public function filter($genre = null)
    {
        $movies = $this->getMovies();

        if ($genre !== null) {
            $filteredMovies = [];

            foreach ($movies as $movie) {
                if ($movie['genre'] === $genre) {
                    $filteredMovies[] = $movie;
                }
            }

            $movies = $filteredMovies;
        }

        return view('movies.filter', [
            'movies' => $movies,
            'genre' => $genre
        ]);
    }
}