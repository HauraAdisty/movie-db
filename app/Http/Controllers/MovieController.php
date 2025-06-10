<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;


class MovieController extends Controller
{
    public function index()
    {
        // $movies = Movie::select('title', 'synopsis', 'cover_image')->paginate(6);
        // return view('movie.index    ', compact('movies'));
        $query = Movie::latest();

        if (request('search')) {
            $query->where('title', 'like', '%' . request('search') . '%');
    }

        $movies = $query ->paginate(6)->withQueryString();
        return view('homepage', compact('movies'));
    }
    public function list()
    {
        $movies = Movie::with('category')->get();
        return view('movie.list_movie', compact('movies'));
    }


    public function search(Request $request)
    {
        $query = $request->input('query');

        // Query pencarian berdasarkan title
        $movies = Movie::where('title', 'LIKE', "%{$query}%")->paginate(6);

        return view('movie.index', compact('movies'));
    }

    public function detail_movie($id, $slug)
    {
        $movie = Movie::find($id);
        // dd($movie);
        return view('movie.detail_movie', compact('movie'));
    }


    public function create()
    {
        $categories = Category::all();
        return view('movie_form', compact('categories'));
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
    public function edit($id)
    {
        $movie = Movie::findOrFail($id);
        $categories = Category::all(); // ambil semua kategori

        return view('movie.edit_movie', compact('movie', 'categories'));
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'synopsis' => 'nullable|string',
            'category_id' => 'required|integer',
            'year' => 'required|integer',
            'actors' => 'nullable|string',
            'cover_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $movie = Movie::findOrFail($id);
        $movie->title = $request->title;
        $movie->slug = Str::slug($request->title); // Generate slug otomatis dari title
        $movie->synopsis = $request->synopsis;
        $movie->category_id = $request->category_id;
        $movie->year = $request->year;
        $movie->actors = $request->actors;

        if ($request->hasFile('cover_image')) {
            if ($movie->cover_image && \Storage::exists('public/' . $movie->cover_image)) {
                \Storage::delete('public/' . $movie->cover_image);
            }

            $path = $request->file('cover_image')->store('covers', 'public');
            $movie->cover_image = $path;
        }

        $movie->save();

        return redirect()->route('movie.list')->with('success', 'Movie updated successfully!');
    }



    public function destroy($id)
    {
        if (Gate::allows('delete-movie')) {
            $movie = Movie::findOrFail($id);
            $movie->delete();

            return redirect('/movies')->with('success', 'Movie deleted successfully.');
        }

        abort(403);
    }
}
