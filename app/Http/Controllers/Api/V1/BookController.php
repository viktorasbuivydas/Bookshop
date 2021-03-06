<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\Book;
use App\Http\Resources\BookResource;
use Illuminate\Support\Facades\Cookie;

class BookController extends Controller
{
    public function index()
    {
        return BookResource::collection(Book::with(['authors'])
            ->when(request('search'), function ($query) {
                $search = request('search');
                //Cookie::queue('search', $search);
                $query->where('title', 'LIKE', "%{$search}%")
                    ->orWhereHas('authors', function($query) use ($search){
                        $query->where('author', 'LIKE', "%{$search}%");
                    });
            })
            ->isApproved()->latest()->get());
    }

    public function show(Book $book)
    {
        return BookResource::collection($book->with('reviews')->latest()->take(5)->get());
    }
}
