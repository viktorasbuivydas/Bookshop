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
        $books = Book::userBook()
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
        $book_model = auth()->user()->books()->create($request->validated());
        $book = new Book();
        $book->authors()->attach($author_id, ['book_id' => $book_model->id]);
        $book->genres()->attach($genre_id, ['book_id' => $book_model->id]);
        return $this->success('Book created successfully');

    }

    public function show(Book $book)
    {
        return $book->userBook()
            ? new ShowResource($book)
            : abort(404);
    }

    public function update(BookRequest $request, Book $book)
    {

        abort_if($book->userBook() || !User::isAdmin(), 404);

        $book->save($request->validated());
        return $this->success('Book updated succesfully');

    }

    public function destroy(Book $book)
    {
        abort_if($book->userBook() || !User::isAdmin(), 404);

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
