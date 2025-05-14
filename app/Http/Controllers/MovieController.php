<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Movie;


class MovieController extends Controller
{
    public function index() 
    {
        // $movies = Movie::select('title', 'synopsis', 'cover_image')->paginate(6);
        // return view('movie.index    ', compact('movies'));
        $movies = Movie::latest()->paginate(6);
        return view('homepage', compact('movies'));
    }

    public function search(Request $request)
    {
        $query = $request->input('query');

        // Query pencarian berdasarkan title
        $movies = Movie::where('title', 'LIKE', "%{$query}%")->paginate(6);

        return view('movie.index', compact('movies'));
    }
}
