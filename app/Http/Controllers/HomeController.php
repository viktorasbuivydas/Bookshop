<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;
use Illuminate\Support\Facades\Auth;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $approved_book_count = Book::isApproved()->count();
        $pending_book_count = Book::isPending()->count();
        $rejected_book_count = Book::isRejected()->count();
        return view('home', compact('approved_book_count', 'pending_book_count', 'rejected_book_count'));
    }
}
