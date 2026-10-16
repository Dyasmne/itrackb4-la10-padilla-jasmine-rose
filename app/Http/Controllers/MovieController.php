<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Movie;

class MovieController extends Controller
{
    /**
     * Display movies from the database.
     */
    public function index(Request $request)
    {
        $genre = $request->query('genre');
        $rating = $request->query('rating');

        $query = Movie::query();

        if ($genre !== null && $genre !== '') {
            $query->where('genre', $genre);
        }

        if ($rating !== null && $rating !== '') {
            $query->where('rating', '>=', (float) $rating);
        }

        $movies = $query->get();

        return view('movies.index', [
            'movies' => $movies,
            'genre' => $genre,
            'rating' => $rating,
        ]);
    }

    /**
     * Show the form for creating a movie.
     */
    public function create()
    {
        return view('movies.create');
    }

    /**
     * Store a movie in the database.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'genre' => 'required|in:Action,Animation,Sci-Fi',
            'rating' => 'required|numeric|min:0|max:10',
            'is_available' => 'sometimes|boolean',
            'release_year' => 'nullable|integer|min:1888|max:2100',
        ]);

        $validated['is_available'] = $request->boolean(
            'is_available',
            true
        );

        Movie::create($validated);

        return redirect()
            ->route('movies.index')
            ->with('success', 'Movie added successfully.');
    }

    /**
     * Display a movie from the database.
     */
    public function show(string $id)
    {
        $movie = Movie::findOrFail($id);

        return view('movies.show', [
            'movie' => $movie,
        ]);
    }

    public function edit(string $id)
    {
        //
    }

    public function update(Request $request, string $id)
    {
        //
    }

    public function destroy(string $id)
    {
        //
    }

    /**
     * Display the featured movie.
     */
    public function featured()
    {
        $movie = Movie::findOrFail(2);

        return view('movies.featured', [
            'movie' => $movie,
        ]);
    }
}