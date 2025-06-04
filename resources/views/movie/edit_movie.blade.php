@extends('layouts.template')

@section('title', 'Form Edit Movie')

@section('content')
    <div class="container mt-5">
        <div class="card shadow-lg rounded-4">
            <div class="card-header bg-success text-white rounded-top-4 d-flex justify-content-between align-items-center">
                <h4 class="mb-0">Form Edit Movie</h4>
                <a href="{{ route('movie.list') }}" class="btn btn-light btn-sm text-success fw-bold">
                    <i class="bi bi-arrow-left-circle me-1"></i> Data Movie
                </a>
            </div>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="card-body p-4">
                <form action="{{ route('movie.update', $movie->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    {{-- Title --}}
                    <div class="mb-3 row">
                        <label for="title" class="col-sm-2 col-form-label">Title</label>
                        <div class="col-sm-10">
                            <input type="text" value="{{ old('title', $movie->title) }}" class="form-control" id="title" name="title" required>
                        </div>
                    </div>

                    {{-- Synopsis --}}
                    <div class="mb-3 row">
                        <label for="synopsis" class="col-sm-2 col-form-label">Synopsis</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" id="synopsis" name="synopsis" rows="5" required>{{ old('synopsis', $movie->synopsis) }}</textarea>
                        </div>
                    </div>

                    {{-- Category --}}
                    <div class="mb-3 row">
                        <label for="category_id" class="col-sm-2 col-form-label">Category</label>
                        <div class="col-sm-10">
                            <select class="form-select" id="category_id" name="category_id" required>
                                <option value="" disabled>-- Pilih Category --</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}" {{ $movie->category_id == $category->id ? 'selected' : '' }}>
                                        {{ $category->category_name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    {{-- Year --}}
                    <div class="mb-3 row">
                        <label for="year" class="col-sm-2 col-form-label">Year</label>
                        <div class="col-sm-10">
                            <input type="number" value="{{ old('year', $movie->year) }}" class="form-control" id="year" name="year" required min="1900" max="{{ date('Y') }}">
                        </div>
                    </div>

                    {{-- Actors --}}
                    <div class="mb-3 row">
                        <label for="actors" class="col-sm-2 col-form-label">Actors</label>
                        <div class="col-sm-10">
                            <input type="text" value="{{ old('actors', $movie->actors) }}" class="form-control" id="actors" name="actors" required>
                        </div>
                    </div>

                    {{-- Cover Image --}}
                    <div class="mb-3 row">
                        <label for="cover_image" class="col-sm-2 col-form-label">Cover Image</label>
                        <div class="col-sm-10">
                            <input type="file" class="form-control" id="cover_image" name="cover_image" accept="image/*">
                            @if ($movie->cover_image)
                                <div class="mt-2">
                                    <img src="{{ asset('storage/' . $movie->cover_image) }}" alt="{{ $movie->title }}" width="150">
                                </div>
                            @endif
                        </div>
                    </div>

                    {{-- Submit Button --}}
                    <div class="mb-3 row">
                        <div class="col-sm-10 offset-sm-2">
                            <button type="submit" class="btn btn-primary">Update Movie</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
 