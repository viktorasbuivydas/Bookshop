<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Author;

class AuthorController extends Controller
{

    public function index()
    {
        $authors = Author::paginate(20);
        return view('admin.authors.index', compact('authors'));
    }

    public function create()
    {
        return view('admin.authors.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'author' => ['required', 'min:4', 'max:20', 'unique:authors,author']
        ]);
        Author::create(['author' => $request->author ]);
        return redirect()->route('admin.authors.create')->with('success', 'Author created successfully');
    }

    public function edit($id)
    {
        $author = Author::findOrFail($id);
        return view('admin.authors.edit', compact('author'));
    }

    public function update(Request $request, $id)
    {
        $author = Author::findOrFail($id);
        $request->validate([
            'author' => ['required', 'min:4', 'max:20', 'unique:authors,author']
        ]);
        $author->author = $request->author;
        $author->save();
        return redirect()->route('admin.authors.create')->with('success', 'Author updated successfully');
    }

    public function destroy($id)
    {
        $author = Author::findOrFail($id);
        $author->delete();
        return redirect()->route('admin.authors.index')->with('success', 'Author was deleted succesfully');
    }
}
