<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title', 'Movie')</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

<div class="container">

    <h1 class="my-4 mb-0">My Movies</h1>
    <p><strong>Jasmine Rose Padilla</strong></p>
    
    @include('partials._nav')
    @yield('content')

</div>
</body>
</html>