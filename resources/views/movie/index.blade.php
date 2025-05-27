@extends('layouts.main')
@section('title')
@section('navHome', 'active')

@section('container')
<h1>Popular Movie</h1>
<div class="container mt-4">
    <div class="row">
        @foreach ($movies as $movie)
            <div class="col-md-6 mb-4">
                <div class="card shadow-sm h-100 d-flex flex-row">
                       <img src="{{ filter_var($movie->cover_image, FILTER_VALIDATE_URL) ? $movie->cover_image : asset('storage/' . $movie->cover_image) }}"
                         alt="{{ $movie->title }}"
                         class="movie-img">
                    <div class="card-body d-flex flex-column justify-content-between" style="width: 60%;">
                        <h5 class="card-title">{{ $movie->title }}</h5>
                        <p class="card-text">{{ Str::limit($movie->synopsis, 100, '...') }}</p>
                       <a href="{{ route('movie.detail', ['id' => $movie->id, 'slug' => $movie->slug]) }}">Lihat Detail</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <div>
        {{ $movies->links('pagination::bootstrap-5') }}
    </div>
</div>
@endsection
