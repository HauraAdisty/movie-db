@extends('layouts.template')

@section('title', 'Homepage')

@section('content')
<style>
    .movie-img {
        width: 250px;
        height: 375px;
        object-fit: cover;
        border-top-left-radius: .25rem;
        border-bottom-left-radius: .25rem;
    }

    .movie-card {
        height: 375px; /* Kartu dan gambar seragam */
    }

    .movie-body {
        width: 100%;
        padding: 1rem;
        overflow: hidden;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
    }
</style>

<h1>Popular Movie</h1>
<div class="container mt-4">
    <div class="row">
        @foreach ($movies as $movie)
            <div class="col-md-6 mb-4">
                <div class="card shadow-sm h-100 d-flex flex-row movie-card">
                    <img src="{{ filter_var($movie->cover_image, FILTER_VALIDATE_URL) ? $movie->cover_image : asset('storage/' . $movie->cover_image) }}"
                         alt="{{ $movie->title }}"
                         class="movie-img">
                    <div class="movie-body">
                        <h5 class="card-title">{{ $movie->title }}</h5>
                        <p class="card-text">{{ Str::limit($movie->synopsis, 100, '...') }}</p>
                        <p class="card-text">Year: {{ $movie->year }}</p>
                        <a href="/movie/{{ $movie->id }}/{{ $movie->slug }}" class="btn btn-success align-self-start">Lihat Selanjutnya</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <div class="d-flex justify-content-end mt-4">
        {{ $movies->links('pagination::bootstrap-5') }}
    </div>
</div>
   
@endsection