<?php

namespace App\Http\Controllers\Admin;

use App\Book;
use App\Http\Controllers\Controller;


class BookController extends Controller
{

    public function index()
    {
        $books = Book::with(['authors'])->isApproved()->latest()->simplePaginate(25);
        return view('admin.books.index', compact('books'));
    }

    public function pending(){
        $books = Book::with(['authors'])->isPending()->latest()->simplePaginate(25);
        return view('admin.books.pending', compact('books'));
    }

    public function show(Book $book)
    {
        return view('admin.books.show', compact('book'));
    }

    public function approve($id, bool $is_approved)
    {
        $book = Book::find($id);
        if($book->is_approved != null){
            return redirect()->route('admin.books.index')->with('error', 'This book status is already changed');
        }
        else{
            $book->is_approved = $is_approved;
            $book->save();
            return redirect()->route('admin.books.index')->with('success', 'Book status changed successfully');
        }

    }
}
