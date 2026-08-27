<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Movie List</title>
</head>
<body>
    <h1>{{ $movie['title'] }}</h1>

<P><strong>ID:</strong> {{  $movie['id'] }}</P>
<P><strong>Title:</strong> {{  $movie['title'] }}</P>
<P><strong>Genre:</strong> {{  $movie['genre'] }}</P>
<P><strong>Rating:</strong> {{  $movie['rating'] }}</P>

<p>Jasmine Rose Padilla</p>
<a href="{{ route('movies.index') }}">Back to Movies</a>
</body>
</html>