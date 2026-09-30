@extends('layouts.app')

@section('title', 'Add Movie')

@section('content')

    <h2 class="mb-4">Add a New Movie</h2>

    <form action="{{ route('movies.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="id" class="form-label">Movie ID</label>
            <input
                type="number"
                name="id"
                id="id"
                class="form-control"
                value="{{ old('id') }}"
            >

            @error('id')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="title" class="form-label">Movie Title</label>
            <input
                type="text"
                name="title"
                id="title"
                class="form-control"
                value="{{ old('title') }}"
            >

            @error('title')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="genre" class="form-label">Genre</label>

            <select name="genre" id="genre" class="form-select">
                <option value="">Select Genre</option>

                <option value="Action" @selected(old('genre') == 'Action')>
                    Action
                </option>

                <option value="Animation" @selected(old('genre') == 'Animation')>
                    Animation
                </option>

                <option value="Sci-Fi" @selected(old('genre') == 'Sci-Fi')>
                    Sci-Fi
                </option>
            </select>

            @error('genre')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="rating" class="form-label">Rating</label>

            <input
                type="number"
                name="rating"
                id="rating"
                class="form-control"
                step="0.1"
                value="{{ old('rating') }}"
            >

            @error('rating')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">
            Add Movie
        </button>

        <a href="{{ route('movies.index') }}" class="btn btn-secondary">
            Back to Movies
        </a>

    </form>

@endsection