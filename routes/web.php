<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MovieController;

Route::get('/movies/featured', [MovieController::class, 'featured'])
     ->name('movies.featured');

Route::get('/movies/filter/{genre?}', [MovieController::class, 'filter'])
     ->name('movies.filter');

Route::resource('movies', MovieController::class)
     ->only(['index', 'show']);