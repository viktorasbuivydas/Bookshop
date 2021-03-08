<?php

namespace App\Http\Controllers\Api\V1\User;

use App\Http\Requests\BookRequest;
use App\Http\Controllers\Api\V1\Controller;

use App\Http\Resources\User\Book\ShowResource;
use App\Http\Resources\User\Book\IndexResource;
use App\Models\User;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Author;
use App\Models\Genre;
use App\Services\ImageService;
use App\Services\TrimService;

class BookController extends Controller
{
    use ApiResponser;

    public function index()
    {
        $books = Book::with('authors')
            ->where('user_id', auth()->id())
            ->isApproved()
            ->latest()
            ->paginate();
        return IndexResource::collection($books);
    }

    public function store(BookRequest $request)
    {
        (new ImageService())->uploadImage($request, 'cover_image_url');
        $trim = new TrimService();
        $authors = $trim->getArrayFromStringInput($request->author);
        $genres = $trim->getArrayFromStringInput($request->genre);
        $author_id = $this->getBookCategories($authors, $request->all_authors, Author::class, 'author');
        $genre_id = $this->getBookCategories($genres, $request->all_genres, Genre::class, 'genre');

        if ($author_id == null || $genre_id == null)
            return $this->error('Please provide at least one book author and genre', 400);
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
        return $this->success('Book created successfully');

    }

    public function show(Book $book)
    {
        return $book->user_id == auth()->id() && $book->is_approved
            ? new ShowResource($book)
            : abort(404);
    }

    public function update(Request $request, Book $book)
    {
        $request->validate([
            'title' => ['required', 'max:100'],
            'description' => ['required', 'max:5000'],
            'price' => ['required', 'numeric', 'min:0'],
            'discount' => ['required', 'numeric', 'min:0', 'max:100'],
        ]);
        if ($book->id != Auth::id() || !User::isAdmin()) {
            abort(404);
        }
        $book->title = $request->title;
        $book->description = $request->description;
        $book->price = $request->price;
        $book->discount = $request->discount;
        $book->save();
        return $this->success('Book updated succesfully');

    }

    public function destroy(Book $book)
    {
        if ($book->user_id !== auth()->id() || !User::isAdmin())
            abort(404);

        $book->authors()->detach();
        $book->genres()->detach();
        $book->reviews()->delete();
        $book->reports()->delete();
        $book->delete();
        return $this->success('Succesfully deleted this book');
    }

    private function getBookCategories($category_from_input, $category_from_database, $model, $column)
    {
        $array_id = $category_from_database;
        if ($category_from_input != null) {
            foreach ($category_from_input as $data) {
                if ($model::where($column, $data)->exists() == false) {
                    $model_data = $model::create([$column => $data]);
                    $array_id[] = $model_data->id;
                }
            }
        }
        return $array_id;
    }
}
