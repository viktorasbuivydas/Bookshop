<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\Book;
use App\Http\Resources\Book\IndexResource;

class BookController extends Controller
{
    public function index()
    {
        return IndexResource::collection(Book::when(request('search'), function ($query) {
            $search = request('search');
            //Cookie::queue('search', $search);
            $query->where('title', 'LIKE', "%{$search}%")
                ->orWhereHas('authors', function ($query) use ($search) {
                    $query->where('author', 'LIKE', "%{$search}%");
                });
        })
            ->isApproved()->latest()->paginate());
    }

    public function show(Book $book)
    {
        return $book->is_approved ? new IndexResource($book) : abort(404);
    }
}
