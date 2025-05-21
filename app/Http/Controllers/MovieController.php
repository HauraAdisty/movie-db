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

    public function detail_movie($id, $slug){
    $movie = Movie::find($id);
    return view('movie_detail', compact('movie'));
    }


    public function create()
    {
        $categories = Category::all();
        return view('movie_form',compact('categories'));
    }

    public function store(Request $request)
{
    // Proses upload cover
    $cover = $request->file('cover_image');
    $namaFileCover = time() . '_' . $cover->getClientOriginalName();
    $cover->move(public_path('covers'), $namaFileCover);

    Movie::create([
        'title' => $request->title,
        'slung' => Str::slug($request->title),
        'synopsis' => $request->synopsis,
        'category_id' => $request->category_id,
        'year' => $request->year,
        'actors' => $request->actors,
        'cover_image' => 'covers/' . $namaFileCover, // simpan folder + nama file
    ]);

    return redirect('/')->with('success', 'Movie berhasil ditambahkan!');
}

}
