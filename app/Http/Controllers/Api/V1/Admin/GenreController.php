<?php

namespace App\Http\Controllers\Api\V1\Admin;
use App\Http\Controllers\Api\V1\Controller;
use Illuminate\Http\Request;
use App\Models\Genre;

class GenreController extends Controller
{

    public function index()
    {
        $genres = Genre::paginate(20);
        return view('admin.genres.index', compact('genres'));
    }

    public function create()
    {
        return view('admin.genres.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'genre' => ['required', 'min:4', 'max:20', 'unique:genres,genre']
        ]);
        Genre::create(['genre' => $request->genre]);
        return redirect()->route('admin.genres.create')->with('success', 'Genre created successfully');
    }

    public function edit($id)
    {
        $genre = Genre::findOrFail($id);
        return view('admin.genres.edit', compact('genre'));
    }

    public function update(Request $request, $id)
    {
        $genre = Genre::findOrFail($id);
        $request->validate([
            'genre' => ['required', 'min:4', 'max:20', 'unique:genres,genre']
        ]);
        $genre->genre = $request->genre;
        $genre->save();
        return redirect()->route('admin.genres.create')->with('success', 'Genre updated successfully');
    }

    public function destroy($id)
    {
        $genre = Genre::findOrFail($id);
        $genre->delete();
        return redirect()->route('admin.genres.index')->with('success', 'Genre was deleted succesfully');
    }
}
