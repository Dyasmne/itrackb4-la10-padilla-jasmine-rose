@extends('layouts.app')

@section('title', $genre ? "Movies: {$genre}" : 'All Movies')

@section('content')

    @if ($genre)
        <h2>Showing movies with genre: {{ $genre }}</h2>
    @else
        <h2>Showing all movies</h2>
    @endif

    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>Title</th>
                <th>Genre</th>
                <th>Rating</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($movies as $movie)
                <tr>
                    <td>
                        <a href="{{ route('movies.show', $movie['id']) }}">{{ $movie['title'] }}</a>
                    </td>
                    <td>{{ $movie['genre'] }}</td>
                    <td>{{ $movie['rating'] }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="3">No movies found for this genre.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <a href="{{ route('movies.index') }}" class="btn btn-primary">Back to Movie List</a>

@endsection