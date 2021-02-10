<?php

namespace App\Http\Controllers;
use App\Book;

class IndexController extends Controller
{
  
    public function index()
    {
        $books = Book::all();
        return view('welcome', compact('books'));
    }
}
