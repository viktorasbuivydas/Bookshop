<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Resources\Admin\Book\IndexResource;
use App\Models\Book;
use App\Http\Controllers\Api\V1\Controller;



class BookController extends Controller
{

    public function index()
    {
        $books = IndexResource::collection(Book::isApproved()->latest()->paginate());
        return $books;
    }

    public function pending(){
        $books = Book::with(['authors'])->isPending()->latest()->simplePaginate(25);
        return $books;
    }

    public function show(Book $book)
    {
        return $book;
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
