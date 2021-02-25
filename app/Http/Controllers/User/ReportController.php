<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Report;
use App\Book;

class ReportController extends Controller
{
    public function store(Book $book){
        if(Report::where('book_id', $book->id)->where('user_id', auth()->id())->exists()){
            return redirect()->route('books.show', $book)->with('error', 'This book is already reported');
        }
        Report::create([
            'book_id' => $book->id,
            'user_id' => auth()->id()
        ]);
        return redirect()->route('books.show', $book)->with('success', 'Successfully reported this book');
    }
}
