@extends('layouts.app')

@section('title', 'All Movies')

@section('content')

<h2>Movie List</h2>

<a href="{{ route('movies.create') }}" class="btn btn-primary mb-3">
    Add Movie
</a>

@if ($genre || $rating)
    <div class="alert alert-info">
        <strong>Active Filters:</strong>

        @if ($genre)
            Genre: {{ $genre }}
        @endif

        @if ($rating)
            @if ($genre)
                |
            @endif

            Rating: {{ $rating }}+
        @endif
    </div>
@else
    <div class="alert alert-secondary">
        No filters applied.
    </div>
@endif

<div class="mb-3">
    <strong>Filter by Genre:</strong>

    <a href="{{ route('movies.index', [
        'genre' => 'Action',
        'rating' => $rating
    ]) }}"
       class="btn btn-sm btn-outline-primary">
        Action
    </a>

    <a href="{{ route('movies.index', [
        'genre' => 'Animation',
        'rating' => $rating
    ]) }}"
       class="btn btn-sm btn-outline-primary">
        Animation
    </a>

    <a href="{{ route('movies.index', [
        'genre' => 'Sci-Fi',
        'rating' => $rating
    ]) }}"
       class="btn btn-sm btn-outline-primary">
        Sci-Fi
    </a>
</div>


<div class="mb-3">
    <strong>Filter by Rating:</strong>

    <a href="{{ route('movies.index', [
        'genre' => $genre,
        'rating' => 8.0
    ]) }}"
       class="btn btn-sm btn-outline-success">
        8.0+
    </a>

    <a href="{{ route('movies.index', [
        'genre' => $genre,
        'rating' => 8.4
    ]) }}"
       class="btn btn-sm btn-outline-success">
        8.4+
    </a>

    <a href="{{ route('movies.index', [
        'genre' => $genre,
        'rating' => 8.5
    ]) }}"
       class="btn btn-sm btn-outline-success">
        8.5+
    </a>
</div>

<div class="mb-4">
    <a href="{{ route('movies.index') }}"
       class="btn btn-secondary">
        Clear All Filters
    </a>
</div>


<table class="table table-striped table-bordered">

    <thead>
        <tr>
            <th>#</th>
            <th>Title</th>
            <th>Genre</th>
            <th>Rating</th>
        </tr>
    </thead>

    <tbody>

        @forelse ($movies as $movie)

            <tr class="@if ($movie['rating'] >= 8.5) table-warning @endif">

                <td>
                    {{ $loop->iteration }}
                </td>

                <td>
                    <a href="{{ route('movies.show', $movie['id']) }}">
                        {{ $movie['title'] }}
                    </a>
                </td>

                <td>
                    {{ $movie['genre'] }}
                </td>

                <td>
                    {{ $movie['rating'] }}

                    @if ($movie['rating'] >= 8.5)
                        <span class="badge bg-warning text-dark">
                            Top Rated
                        </span>
                    @endif
                </td>

            </tr>

        @empty

            <tr>
                <td colspan="4">
                    No movies available right now.
                </td>
            </tr>

        @endforelse

    </tbody>

    </table>

@endsection