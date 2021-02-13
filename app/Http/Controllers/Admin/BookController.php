<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\BookRequest;
use App\Http\Controllers\Controller;

use Illuminate\Support\Str;

use App\Services\TrimService;
use App\Book;
use App\Author;
use App\Genre;

use App\Services\ImageService;

class BookController extends Controller
{
    public function __construct(){
        $this->middleware('checkRole:admin');
    }
    public function index()
    {
        return view('user.books.index');
    }

    public function create()
    {
       
    }

   
    public function store(BookRequest $request)
    {
        
    }

   
    public function show($id)
    {
        //
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
