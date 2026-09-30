<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MovieController extends Controller
{
    private function getMovies()
    {
        $path = storage_path('app/movies.json');

        $json = file_get_contents($path);

        return json_decode($json, true);
    }

    private function saveMovies($movies)
    {
        $path = storage_path('app/movies.json');

        file_put_contents(
            $path,
            json_encode($movies, JSON_PRETTY_PRINT)
        );
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $genre = $request->query('genre', null);
        $rating = $request->query('rating', null);

        $movies = $this->getMovies();

        if ($genre !== null) {
            $movies = array_filter($movies, function ($movie) use ($genre) {
                return $movie['genre'] === $genre;
            });
        }

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
        return view('movies.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'id' => 'required|integer|min:1',
            'title' => 'required|string|max:255',
            'genre' => 'required|in:Action,Animation,Sci-Fi',
            'rating' => 'required|numeric|min:0|max:10',
        ]);

        $movies = $this->getMovies();

        $movies[] = $validated;

        $this->saveMovies($movies);

        return redirect()
            ->route('movies.index')
            ->with('success', 'Movie added successfully.');
    }

    /**
     * Display the specified resource.
     */public function show(string $id)
{
    $movies = $this->getMovies();

    $movie = null;

    foreach ($movies as $item) {
        if ((int) $item['id'] === (int) $id) {
            $movie = $item;
            break;
        }
    }

    if ($movie === null) {
        abort(404);
    }

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

        $featuredMovie = $movies[1];

        return view('movies.featured', [
            'movie' => $featuredMovie
        ]);
    }
}