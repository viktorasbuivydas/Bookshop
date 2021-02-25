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
        $approved_book_count = Book::isApproved()->count();
        $pending_book_count = Book::isPending()->count();
        $rejected_book_count = Book::isRejected()->count();
        return view('home', compact('approved_book_count', 'pending_book_count', 'rejected_book_count'));
    }
}
