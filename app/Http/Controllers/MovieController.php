<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MovieController extends Controller
{
    public function index()
    {
        $movies = [
            [
                'title' => 'Avengers: Endgame',
                'genre' => 'Action',
                'rating' => 8.4
            ],
            [
                'title' => 'Spider-Man: No Way Home',
                'genre' => 'Action',
                'rating' => 8.2
            ],
            [
                'title' => 'Inside Out',
                'genre' => 'Animation',
                'rating' => 8.1
            ],
            [
                'title' => 'Coco',
                'genre' => 'Animation',
                'rating' => 8.4
            ],
            [
                'title' => 'Interstellar',
                'genre' => 'Sci-Fi',
                'rating' => 8.7
            ],
        ];

        return view('movies.index', ['movies' => $movies]);
    }
}