<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\Book;

class HomeController extends Controller
{
    public function index()
    {
        $books = Book::select('is_approved')->get();
        $approved_book_count = $books->where('is_approved', true)->count();
        $pending_book_count = $books->whereNull('is_approved')->count();
        $rejected_book_count = $books->where('is_approved', false)->whereNotNull('is_approved')->count();
        return [
            'approved_book_count' => $approved_book_count,
            'pending_book_count' => $pending_book_count,
            'rejected_book_count' => $rejected_book_count
        ];
    }
}
