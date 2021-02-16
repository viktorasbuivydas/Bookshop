<?php

namespace App\Http\Controllers;

use App\Http\Requests\BookRequest;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Auth;
use App\Book;


class BookController extends Controller
{

    public function index()
    {
        return view('books.index');
    }

    public function show(Book $book)
    {
        return view('books.show', compact('book'));
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }
}
