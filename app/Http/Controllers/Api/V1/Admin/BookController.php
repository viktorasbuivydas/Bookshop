<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Resources\Admin\Book\IndexResource;
use App\Http\Resources\Admin\Book\ShowResource;
use App\Models\Book;
use App\Http\Controllers\Api\V1\Controller;
use App\Traits\ApiResponser;


class BookController extends Controller
{
    use ApiResponser;

    public function index()
    {
        return IndexResource::collection(Book::isApproved()->latest()->paginate());
    }

    public function pending(){
        return Book::with(['authors'])->isPending()->latest()->paginate();
    }

    public function show(Book $book)
    {
        return new ShowResource($book);
    }

    public function approve(Book $book, bool $is_approved)
    {

        if($book->is_approved != null){
            return $this->error('This book status is already changed', 400);
        }
        else{
            $book->is_approved = $is_approved;
            $book->save();
            return $this->success('Book status changed successfully');
        }

    }
}
