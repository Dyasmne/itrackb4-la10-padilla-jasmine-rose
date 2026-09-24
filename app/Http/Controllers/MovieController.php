<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MovieController extends Controller
{
    private function getMovies()
    {
        return [
            ['id' => 1,'title' => 'Avengers: Endgame','genre' => 'Action','rating' => 8.4],
            ['id' => 2,'title' => 'Spider-Man: No Way Home','genre' => 'Action','rating' => 8.2],
            ['id' => 3,'title' => 'Inside Out','genre' => 'Animation','rating' => 8.1],
            ['id' => 4,'title' => 'Coco','genre' => 'Animation','rating' => 8.4],
            ['id' => 5,'title' => 'Interstellar','genre' => 'Sci-Fi','rating' => 8.7],
            ['id' => 6,'title' => 'The Lion King','genre' => 'Animation','rating' => 8.5],
        ];
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // Get both filters from the query string
        $genre = $request->query('genre', null);
        $rating = $request->query('rating', null);

        // Get all movies
        $movies = $this->getMovies();

        // Apply genre filter
        if ($genre !== null) {
            $movies = array_filter($movies, function ($movie) use ($genre) {
                return $movie['genre'] === $genre;
            });
        }

        // Apply rating filter
        if ($rating !== null) {
            $movies = array_filter($movies, function ($movie) use ($rating) {
                return $movie['rating'] >= (float) $rating;
            });
        }

        return view('movies.index', [
            'movies' => $movies,
            'genre' => $genre,
            'rating' => $rating
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $movies = $this->getMovies();

        if (!is_numeric($id) || !isset($movies[$id - 1])) {
            abort(404);
        }

        $movie = $movies[$id - 1];

        return view('movies.show', [
            'movie' => $movie
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    /**
     * Display the featured movie.
     */
    public function featured()
    {
        $movies = $this->getMovies();

        $featuredMovie = $movies[0];

        return view('movies.featured', [
            'movie' => $featuredMovie
        ]);
    }
}