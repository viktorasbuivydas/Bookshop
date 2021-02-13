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
        $book_authors = (new AuthorService())->getAuthors($request->all_authors, $authors);
        $book_genres = (new GenreService())->getGenres($request->all_genres, $genres);
        
        if(Book::where([
        'title' => $request->title,
        'description' => $request->description
        ])
        ->exists()){
            return redirect()->route('user.books.create')->with('error', 'Book already exists');
        }
        $book_model = Auth::user()->books()->create(
            [
            'title' => $request->title,
            'cover_image_url' => $request->cover_image_url,
            'description' => $request->description,
            'price' => $request->price,
            'discount' => $request->discount,
        ]);
        //add authors to book_authors
        foreach($book_authors as $book_author){
            BookAuthor::create(['author_id' => $book_author, 'book_id' => $book_model->id]);
        }
        foreach($book_genres as $book_genre){
            BookGenre::create(['genre_id' => $book_genre, 'book_id' => $book_model->id]);
        }
        return redirect()->route('user.books.create')->with('success', 'Book created successfully');
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
