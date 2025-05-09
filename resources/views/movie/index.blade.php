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
                    <img src="{{ $movie->cover_image }}" class="card-img-left" alt="{{ $movie->title }}" style="width: 40%; height: 100%; object-fit: cover;">
                    <div class="card-body d-flex flex-column justify-content-between" style="width: 60%;">
                        <h5 class="card-title">{{ $movie->title }}</h5>
                        <p class="card-text">{{ Str::limit($movie->synopsis, 100, '...') }}</p>
                        <a href="#" class="btn btn-success align-self-start">Lihat Selanjutnya</a>
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
