@extends('layouts.app')
@section('title', 'Featured Movies')
@section('content')

    <h2>Featured Movies</h2>

    <div class="card" style="max-width: 400px;">
        <div class="card-body">
            <h3 class="card-title">{{ $movie['title'] }}</h3>
            <p class="card-text"><strong>ID:</strong> {{ $movie['id'] }}</p>
            <p class="card-text"><strong>Genre:</strong> {{ $movie['genre'] }}</p>
            <p class="card-text"><strong>Rating:</strong> {{ $movie['rating'] }}</p>

            <a href="{{ route('movies.show', $movie['id']) }}" class="btn btn-primary">
                View Movie
            </a>
        </div>
    </div>

@endsection