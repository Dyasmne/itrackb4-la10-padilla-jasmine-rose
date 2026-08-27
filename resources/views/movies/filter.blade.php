<!DOCTYPE html>
<html>
<head>
    <title>My Movie Filter</title>
</head>
<body>
     <h1>Movie Filter</h1>
     <p>Prepared by: Jasmine Rose Padilla</p>
     @if ($genre)
    <h2>Showing movies with genre: {{ $genre }}</h2>
     @else
    <h2>Showing all movies</h2>
    @endif
    <table border="1" cellpadding="8">
        <tr>
            <th>Title</th>
            <th>Genre</th>
            <th>Rating</th>
        </tr>
         @foreach ($movies as $movie)
        <tr>
           <td>
            <a href="{{ route('movies.show', $movie['id']) }}">{{ $movie['title'] }}</a></td>
                <td>{{ $movie['genre'] }}</td>
                <td>{{ $movie['rating'] }}</td>
        </tr>
        @endforeach
    </table>
       <br>
           <a href="{{ route('movies.index') }}">Back to Movie List</a>

</body>
</html>