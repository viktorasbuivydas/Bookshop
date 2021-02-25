<?php

namespace App\Http\Controllers;

use App\Book;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $books = Book::select('is_approved')->get();
        $approved_book_count = $books->where('is_approved', true)->count();
        $pending_book_count = $books->whereNull('is_approved')->count();
        $rejected_book_count = $books->where('is_approved', false)->whereNotNull('is_approved')->count();
        return view('home', compact('approved_book_count', 'pending_book_count', 'rejected_book_count'));
    }
}
