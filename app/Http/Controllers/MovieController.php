<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;


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

    public function detail_movie($id,$slug) {
        $movie = Movie::find($id);
        // dd($movie);
        return view('movie.detail_movie', compact('movie'));
    }


    public function create()
    {
        $categories = Category::all();
        return view('movie_form',compact('categories'));
    }

    public function store(Request $request)
{
    $validated = $request->validate([
        'title' => 'required',
        'synopsis' => 'required',
        'category_id' => 'required',
        'year' => 'required|integer|min:1900|max:' . date('Y'),
        'actors' => 'required',
        'cover_image' => 'required|image|max:2048',
    ]);

    // Buat slug dari title, misalnya "Judul Film Keren" jadi "judul-film-keren"
    $validated['slug'] = Str::slug($request->title);

    // Upload cover image
    if ($request->hasFile('cover_image')) {
            $validated['cover_image'] = $request->file('cover_image')->store('covers', 'public');
        }

    Movie::create($validated);

    return redirect()->route('movie.index')->with('success', 'Movie berhasil ditambahkan!');
}

    public function show($id)
{
    $movie = Movie::findOrFail($id);
    return redirect()->route('movie.detail', ['id' => $movie->id, 'slug' => $movie->slug]);
}


}
