<?php

namespace App\Http\Controllers;

use App\Book;

class BookController extends Controller
{

    public function show(Book $book)
    {
        $book->with('reviews')->latest()->take(5)->get();
        return view('books.show', compact('book'));
    }
}
