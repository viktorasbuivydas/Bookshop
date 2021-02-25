<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;
use Illuminate\Support\Facades\Auth;


class HomeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $books = Book::select('is_approved')->get();
        $approved_book_count = $books->where('is_approved', 1)->count();
        $pending_book_count = $books->where('is_approved', NULL)->count();
        $rejected_book_count = $books->where('is_approved', 0)->count();
        return view('home', compact('approved_book_count', 'pending_book_count', 'rejected_book_count'));
    }
}
