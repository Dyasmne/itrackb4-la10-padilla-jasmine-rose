@extends('layouts.app')

@section('title', 'All Movies')

@section('content')
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
                    <td>{{ $loop->iteration }}</td>
                    <td>
                        <a href="{{ route('movies.show', $movie['id']) }}">{{ $movie['title'] }}</a>
                    </td>
                    <td>{{ $movie['genre'] }}</td>
                    <td>
                        {{ $movie['rating'] }}
                        @if ($movie['rating'] >= 8.5)
                            <span class="badge bg-warning text-dark">Top Rated</span>
                        @endif
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4">No movies available right now.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection