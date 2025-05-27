@extends('layouts.template')

@section('title', 'Detail Movie')

@section('content')


    <div class="row">
        <div class="col-lg-12">

            <div class="card mb-3">

                <div class="row g-0">
                    @if (filter_var($movie->cover_image, FILTER_VALIDATE_URL))
                        <img src="{{ $movie->cover_image }}" alt="{{ $movie->title }}" style="width: 250px; height: auto;">
                    @else
                        <img src="{{ asset('storage/' . $movie->cover_image) }}" alt="{{ $movie->title }}" style="width: 250px; height: auto;">
                    @endif
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title">{{ $movie->title }}</h5>
                            <p class="card-text">{{ $movie->synopsis }}</p>
                            <p class="card-text">Actors : {{ $movie->actors }}</p>
                            <p class="card-text">Category : {{ $movie->category_name }}</p>
                            <p class="card-text"><small class="text-body-secondary">Year: {{ $movie->year }}</small></p>
                            <a href="/"class="btn btn-success">Back</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection