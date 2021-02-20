<?php

namespace App\Http\Controllers;
use App\Book;

class IndexController extends Controller
{

    public function index()
    {
        $books = Book::with(['authors', 'genres'])->isApproved()->simplePaginate(2);
        //dd($books);
        return view('welcome', compact('books'));
    }
}
