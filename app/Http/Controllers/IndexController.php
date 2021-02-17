<?php

namespace App\Http\Controllers;
use App\Book;

class IndexController extends Controller
{

    public function index()
    {
        $books = Book::with(['authors', 'genres'])->where('is_approved', true)->paginate(25);
        //dd($books);
        return view('welcome', compact('books'));
    }
}
