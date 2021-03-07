<?php

namespace App\Http\Controllers\Api\V1\User;

use App\Http\Requests\BookRequest;
use App\Http\Controllers\Api\V1\Controller;

use App\Http\Resources\BookResource;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Author;
use App\Models\Genre;
use App\Services\ImageService;
use App\Services\TrimService;

class BookController extends Controller
{
    public function index()
    {

        $books = Book::with('authors')
            ->where('user_id', auth()->id())
            ->isApproved()
            ->latest()
            ->paginate();
        return BookResource::collection($books);
    }

    public function store(BookRequest $request)
    {
        (new ImageService())->uploadImage($request, 'cover_image_url');
        $trim = new TrimService();
        $authors = $trim->getArrayFromStringInput($request->author);
        $genres = $trim->getArrayFromStringInput($request->genre);
        $author_id = $this->getBookCategories($authors, $request->all_authors, Author::class, 'author');
        $genre_id = $this->getBookCategories($genres, $request->all_genres, Genre::class, 'genre');

        if($author_id == null || $genre_id == null)
            return redirect()->route('user.books.create')->with('error', 'Please provide at least one book author and genre');
        $book_model = auth()->user()->books()->create(
            [
                'title' => $request->title,
                'cover_image_url' => $request->cover_image_url,
                'description' => $request->description,
                'price' => $request->price,
                'discount' => $request->discount,
            ]);
        $book = new Book();
        $book->authors()->attach($author_id, ['book_id' => $book_model->id]);
        $book->genres()->attach($genre_id, ['book_id' => $book_model->id]);
        return redirect()->route('user.books.create')->with('success', 'Book created successfully');

    }

    public function show(Book $book)
    {
        return $book;
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => ['required', 'max:100'],
            'description' => ['required', 'max:5000'],
            'price' => ['required', 'numeric', 'min:0'],
            'discount' => ['required', 'numeric', 'min:0', 'max:100'],
        ]);
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
        if($book->user_id !== auth()->id() || !User::isAdmin())
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
}
