<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Movie;
use App\Models\Genre;

class MovieController extends Controller
{
    /**
     * Display movies from the database.
     * Screenshot 6: BEFORE eager loading.
     */
    public function index(Request $request)
    {
        $genre = $request->query('genre_id');
        $rating = $request->query('rating');

        $genres = Genre::all();

        // BEFORE: No eager loading.
        $moviesQuery = Movie::query()->with('genre');

        if ($genre !== null && $genre !== '') {
            $moviesQuery->where('genre_id', $genre);
        }

        if ($rating !== null && $rating !== '') {
            $moviesQuery->where('rating', '>=', (float) $rating);
        }

        $movies = $moviesQuery->get();

        return view('movies.index', compact(
            'movies',
            'genres',
            'genre',
            'rating'
        ));
    }

    /**
     * Show the form for creating a movie.
     */
    public function create()
    {
        $genres = Genre::all();

        return view('movies.create', [
            'genres' => $genres
        ]);
    }

    /**
     * Store a newly created movie.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'genre_id' => 'required|exists:genres,id',
            'rating' => 'required|numeric|min:0|max:10',
            'is_available' => 'sometimes|boolean',
            'release_year' => 'nullable|integer|min:1888|max:2100',
        ]);

        $validated['is_available'] = $request->boolean('is_available');

        Movie::create($validated);

        return redirect()
            ->route('movies.index')
            ->with('success', 'Movie added successfully!');
    }

    /**
     * Display the specified movie.
     */
    public function show(string $id)
    {
        $movie = Movie::findOrFail($id);

        return view('movies.show', [
            'movie' => $movie
        ]);
    }

    /**
     * Show the form for editing a movie.
     */
    public function edit(string $id)
    {
        $movie = Movie::findOrFail($id);
        $genres = Genre::all();

        return view('movies.edit', compact('movie', 'genres'));
    }

    /**
     * Update the specified movie.
     */
    public function update(Request $request, string $id)
    {
        $movie = Movie::findOrFail($id);

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'genre_id' => 'required|exists:genres,id',
            'rating' => 'required|numeric|min:0|max:10',
            'is_available' => 'sometimes|boolean',
            'release_year' => 'nullable|integer|min:1888|max:2100',
        ]);

        $validated['is_available'] = $request->boolean('is_available');

        $movie->update($validated);

        return redirect()
            ->route('movies.index')
            ->with('success', 'Movie updated successfully!');
    }

    /**
     * Remove the specified movie.
     */
    public function destroy(string $id)
    {
        $movie = Movie::findOrFail($id);
        $movie->delete();

        return redirect()
            ->route('movies.index')
            ->with('success', 'Movie deleted successfully!');
    }

    /**
     * Display a featured movie.
     */
    public function featured()
    {
        $movie = Movie::firstOrFail();

        return view('movies.featured', [
            'movie' => $movie
        ]);
    }
}