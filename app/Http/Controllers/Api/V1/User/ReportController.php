<?php

namespace App\Http\Controllers\Api\V1\User;

use App\Http\Controllers\Api\V1\Controller;
use App\Models\Report;
use App\Models\Book;

class ReportController extends Controller
{
    public function store(Book $book){
        if(Report::where('book_id', $book->id)->where('user_id', auth()->id())->exists()){
            return redirect()->route('books.show', $book)->with('error', 'This book is already reported');
        }
    }
}
