<?php

namespace App\Http\Controllers\Api\V1\User;

use App\Http\Controllers\Api\V1\Controller;
use App\Http\Requests\ReviewRequest;
use App\Models\BookReview;
use App\Traits\ApiResponser;

class ReviewController extends Controller
{
    use ApiResponser;

    public function store(ReviewRequest $request)
    {
        if (BookReview::userReview($request->book_id)->exists()) {
            return $this->error('You already wrote a review to this book', 400);
        }
        BookReview::create($request->validated());
        return $this->success('Succesfully wrote a review');

    }
}
