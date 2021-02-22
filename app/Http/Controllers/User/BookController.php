<?php

namespace App\Http\Controllers\User;

use App\Http\Requests\BookRequest;
use App\Http\Controllers\Controller;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Book;
use App\Author;
use App\Genre;
use App\Services\ImageService;
use App\Services\TrimService;

class BookController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    public function index()
    {
        $books = Book::with('authors')->where('user_id', Auth::id())->isApproved()->latest()->simplePaginate(25);
        return view('user.books.index', compact('books'));
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
        $author_id = $this->getBookCategories($authors, $request->all_authors, Author::class, 'author');
        $genre_id = $this->getBookCategories($genres, $request->all_genres, Genre::class, 'genre');

        $book = new Book();
        if($book->where([
            'title' => $request->title,
            'description' => $request->description
        ])
            ->exists()){
            return redirect()->route('user.books.create')->with('error', 'Book already exists');
        }
        if($author_id == null || $genre_id == null)
            return redirect()->route('user.books.create')->with('error', 'Please provide at least one book author and genre');
        $book_model = Auth::user()->books()->create(
            [
                'title' => $request->title,
                'cover_image_url' => $request->cover_image_url,
                'description' => $request->description,
                'price' => $request->price,
                'discount' => $request->discount,
            ]);
        $book->authors()->attach($author_id, ['book_id' => $book_model->id]);
        $book->genres()->attach($genre_id, ['book_id' => $book_model->id]);
        return redirect()->route('user.books.create')->with('success', 'Book created successfully');

    }


    public function show(Book $book)
    {
        return view('user.books.show', compact('book'));
    }

    public function edit($id)
    {
        $authors = Author::all();
        $genres = Genre::all();
        $book = Book::with(['authors', 'genres'])->findOrFail($id);
        return view('user.books.edit', compact(['authors', 'genres', 'book']));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => ['required', 'max:100'],
            'description' => ['required', 'max:5000'],
            'price' => ['required', 'numeric', 'min:0'],
            'discount' => ['required', 'numeric', 'min:0', 'max:100'],
        ]);
        $user = new User();
        $book = Book::findOrFail($id);
        if($book->id != Auth::id() || !User::isAdmin()){
            abort(404);
        }
        $book->title = $request->title;
        $book->description = $request->description;
        $book->price = $request->price;
        $book->discount = $request->discount;
        $book->save();
        return redirect()->route('user.books.show', $book)->with('success', 'Book updated succesfully');

    }


    public function destroy(Book $book)
    {

        if($book->user_id !== Auth::id() || !User::isAdmin())
            abort(404);

        $book->authors()->detach();
        $book->genres()->detach();
        $book->reviews()->delete();
        $book->reports()->delete();
        $book->delete();
        return redirect()->route('user.books.index');
    }
    private function getBookCategories($category_from_input, $category_from_database, $model, $column){
            $array_id = $category_from_database;
            if($category_from_input != null){
                foreach ($category_from_input as $data){
                    if($model::where($column, $data)->exists() == false){
                        $model_data = $model::create([$column => $data]);
                        $array_id[] = $model_data->id;
                    }
                }
            }

        return $array_id;
    }
    public function prepareBook(BookRequest $request){

    }
}
