<nav class="nav mb-3">

    <a class="nav-link {{ request()->is('movies*') ? 'active fw-bold' : '' }}"
       href="{{ route('movies.index') }}">
        Movies
    </a>

    <a class="nav-link {{ request()->is('movies/featured') ? 'active fw-bold' : '' }}"
       href="{{ route('movies.featured') }}">
        Featured : Movies
    </a>

</nav>