<?php

namespace App\Http\Controllers\User;

use App\Http\Requests\BookRequest;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Auth;
use App\Book;
use App\Author;
use App\Genre;
use App\BookAuthor;
use App\BookGenre;
use App\Services\ImageService;
use App\Services\AuthorService;
use App\Services\GenreService;
use App\Services\TrimService;

class BookController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    public function index()
    {
        return view('user.books.index');
    }

    public function create()
    {
        $authors = Author::all();
        $genres = Genre::all();
        return view('user.books.create', compact('authors', 'genres'));
    }


    public function store(BookRequest $request)
    {
        (new ImageService())->uploadImage($request, 'cover_image_url');
        $trim = new TrimService();
        $authors = $trim->getArrayFromStringInput($request->author);
        $genres = $trim->getArrayFromStringInput($request->genre);
        $book = new Book();
        if($book->where([
        'title' => $request->title,
        'description' => $request->description
        ])
        ->exists()){
            return redirect()->route('user.books.create')->with('error', 'Book already exists');
        }
        if($authors == null)
                return redirect()->route('user.books.create')->with('error', 'Please provide at least one book author');
        if($genres == null)
                return redirect()->route('user.books.create')->with('error', 'Please provide at least one book genre');
        Auth::user()->books()->create(
            [
            'title' => $request->title,
            'cover_image_url' => $request->cover_image_url,
            'description' => $request->description,
            'price' => $request->price,
            'discount' => $request->discount,
        ]);
        dd($authors);
        $book->authors()->attach($authors);
        $book->genres()->attach($genres);

        //$book->authors()->sync($book_authors);
        //$book->genres()->sync($book_genres);
        return redirect()->route('user.books.create')->with('success', 'Book created successfully');
    }


    public function show($id)
    {
        //abort(404)
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
