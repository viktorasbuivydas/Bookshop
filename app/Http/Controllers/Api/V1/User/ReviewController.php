<?php

namespace App\Http\Controllers\Api\V1\User;

use App\Http\Controllers\Api\V1\Controller;
use App\Http\Requests\ReviewRequest;
use App\Models\BookReview;
use App\Models\Book;
use App\Traits\ApiResponser;

class ReviewController extends Controller
{
    use ApiResponser;

    public function store(ReviewRequest $request)
    {
        $book = Book::where('is_approved', '!=', null)->where('id', $request->book_id)->firstOrFail();
        BookReview::create(
            [
                'rating' => $request->rating,
                'review' => $request->review,
                'book_id' => $request->book_id,
                'user_id' => auth()->id()
            ]
        );
        return $this->success('Succesfully wrote a review');
    }
}
