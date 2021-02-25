<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\ReviewRequest;
use App\BookReview;
use App\Book;

class ReviewController extends Controller
{
    public function store(ReviewRequest $request){
        $book = Book::where('is_approved', '!=', null)->where('id', $request->book_id)->firstOrFail();
        BookReview::create(
            [
                'rating' => $request->rating,
                'review' => $request->review,
                'book_id' => $request->book_id,
                'user_id' => auth()->id()
            ]
        );
        return redirect()->route('books.show', $book)->with('success', 'Succesfully wrote a review');
    }
}
