@extends('layouts.app')

@section('title', $movie['title'])

@section('content')
    <div class="card" style="max-width: 400px;">
        <div class="card-body">
            <h5 class="card-title">{{ $movie['title'] }}</h5>
            <p class="card-text">Genre: {{ $movie['genre'] }}</p>
            <p class="card-text">Rating: {{ $movie['rating'] }}</p>
            <a href="{{ route('movies.index') }}" class="btn btn-primary">Back to List</a>
        </div>
    </div>
@endsection