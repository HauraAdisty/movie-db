<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Movie DB</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-success">
        <div class="container">
            <a class="navbar-brand" href="#">Movie DB</a>
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item"><a class="nav-link" href="{{ route('movies.index') }}">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="/movie/create">Add Movie</a></li>
                    
                </ul>
               <form class="d-flex me-3">
                <input class="form-control me-2" type="search" name="search" placeholder="Search by title" aria-label="Search" value="{{ request()->query('query') }}">
                <button class="btn btn-outline-light" type="submit">Search</button>
            </form>
                @auth
                    <div class="d-flex align-items-center text-white me-2">
                        Hello, {{ explode(' ', auth()->user()->name)[0] ?? auth()->user()->email }}
                    </div>
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-outline-light">Logout</button>
                    </form>
                    @endauth


                        @guest
                        <a href="{{ route('login') }}" class="btn btn-outline-light">Login</a>
                @endguest
            </div>
        </div>
    </nav>

    <div class="container my-4">
        @yield('content')
    </div>

    <footer class="bg-success text-white text-center py-3 mt-5">
        Copyright © {{ date('Y') }} Developed by Haura Adisty
    </footer>

</body>
</html>
