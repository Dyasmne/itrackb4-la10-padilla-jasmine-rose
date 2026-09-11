@extends('layouts.app')

@section('title', 'Featured Movies')

@section('content')

    <h2>Featured Movies</h2>

    <div class="card">
        <div class="card-body">

            <h3>{{ $movie['title'] }}</h3>

            <p><strong>ID:</strong> {{ $movie['id'] }}</p>
            <p><strong>Genre:</strong> {{ $movie['genre'] }}</p>
            <p><strong>Rating:</strong> {{ $movie['rating'] }}</p>

            <a href="{{ route('movies.show', $movie['id']) }}" class="btn btn-primary">
                View Movie
            </a>

        </div>
    </div>

@endsection