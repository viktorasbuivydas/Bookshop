<?php

namespace App\Http\Controllers;
use App\Book;

class IndexController extends Controller
{

    public function index()
    {
        $books = Book::with(['authors'])->isApproved()->latest()->simplePaginate(25);
        //dd($books);
        return view('welcome', compact('books'));
    }
}
