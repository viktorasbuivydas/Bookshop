<?php

namespace App\Http\Controllers\User;

use App\Http\Requests\BookRequest;
use App\Http\Controllers\Controller;

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
        $books = Book::with('authors')->isApproved()->latest()->simplePaginate(25);
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
        if($author_id == null)
                return redirect()->route('user.books.create')->with('error', 'Please provide at least one book author');
        if($genre_id == null)
                return redirect()->route('user.books.create')->with('error', 'Please provide at least one book genre');
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
}
