<?php

namespace App\Http\Controllers;

use App\Http\Requests\BookRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

use App\Services\TrimService;
use App\Book;
use App\Author;
use App\Genre;

use App\Services\ImageService;

class BookController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    public function index()
    {
        return view('book.index');
    }

    public function create()
    {
        $authors = Author::all();
        $genres = Genre::all();
        return view('book.create', compact('authors', 'genres'));
    }

   
    public function store(BookRequest $request)
    {
        if($request->hasFile('cover_image_url')){
            if($request->file('cover_image_url')->isValid()){
                $image = $request->file('cover_image_url');
                $image_title = Str::random(25) .'.' .$image->getClientOriginalExtension();
                (new ImageService())->uploadOne($image, 'public', $image_title);
                $request->cover_image_url = $image_title;
            }
        }
        $trim = new TrimService();
        $authors = $trim->getArrayFromStringInput($request->author);
        $genres = $trim->getArrayFromStringInput($request->genre);

        foreach($authors as $author){
                if(!Author::where('author', $author)->exists())
                Author::create(['author' => $author]);
        }
        foreach($genres as $genre){
            if(!Genre::where('genre', $genre)->exists())
            Genre::create(['genre' => $genre]);
        }
        if(Book::where('title', $request->title)->where('description', $request->description)->exists()){
            return redirect()->route('book.create')->with('error', 'Book already exists');
        }
        Auth::user()->books()->create(
            [
            'title' => $request->title,
            'cover_image_url' => $request->cover_image_url,
            'description' => $request->description,
        ]);
        
        return redirect()->route('book.create')->with('success', 'Book created successfully');
    }

   
    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

   
    public function destroy($id)
    {
        //
    }
}
