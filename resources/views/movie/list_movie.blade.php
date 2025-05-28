@extends('layouts.main')
@section('title', 'List Movie')
@section('navMovie', 'active')
@section('container')
    <h1>List Movie</h1>
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Title</th>
                <th scope="col">Category</th>
                <th scope="col">Year</th>
                <th scope="col" class="text-center">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($movies as $index => $movie)
                <tr>
                    <th scope="row">{{ $index + 1 }}</th>
                    <td>{{ $movie->title }}</td>
                    <td>{{ $movie->category->category_name }}</td>
                    <td>{{ $movie->year }}</td>
                    <td class="text-center">
                        
                        <a href="{{ route('movie.detail', ['id' => $movie->id, 'slug' => $movie->slug]) }}" class="btn btn-success btn-sm">Detail</a>
                    
                        <a href="{{ route('movie.edit', $movie->id) }}" class="btn btn-warning btn-sm">Edit</a>

                        <form action="{{ route('movie.destroy', $movie->id) }}" method="POST" class="d-inline"
                            onsubmit="return confirm('Are you sure?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </td>

                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
