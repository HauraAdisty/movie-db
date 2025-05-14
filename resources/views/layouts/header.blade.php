<header>
    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-success">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Movie DB</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link @yield('navHome')" aria-current="page" href="{{ route('movies.index') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link @yield('navWatch')" href="#">Watchlist</a>
                    </li>
                </ul>
  
                <!-- Search Bar -->
                <form class="d-flex" action="{{ route('movies.search') }}" method="GET">
                    <input class="form-control me-2" type="search" name="query" placeholder="Search by title" aria-label="Search" value="{{ request()->query('query') }}">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
            </div>
        </div>
    </nav>
  </header>
  