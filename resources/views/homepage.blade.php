@extends('layouts/template')

@section('content')
    <h2 class="mb-4">Popular Movie</h2>
 
    <div class="row row-cols-1 row-cols-md-2 g-4">
        @foreach ($movies as $movie)
            <div class="col-md-6">
                <div class="card mb-3" style="max-width: 540px;">
                    @if ($movie->cover_image)
                        <div class="row g-0">
                            <div class="col-md-4">
                                <img src="{{ $movie->cover_image }}" class="card-img-top"
                                    style="height: 300px; object-fit: cover;" alt="{{ $movie->title }}">
                            </div>
                            <div class="col-md-8">
                    @endif
                    <div class="card-body d-flex flex-column justify-content-between h-100">
                        <h5 class="card-title">{{ $movie->title }}</h5>
                        <p class="card-text">{{ Str::limit($movie->synopsis, 150) }}</p>
                        <p class="card-text"><a href="#" class="btn btn-success ">Read More</a></p>
                    </div>
                </div>
            </div>
    </div>
    </div>
    @endforeach
    </div>

    <div>
        {{ $movies->links('pagination::bootstrap-5') }}
    </div>
@endsection
