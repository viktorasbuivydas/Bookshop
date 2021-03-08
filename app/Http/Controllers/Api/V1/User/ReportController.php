<?php

namespace App\Http\Controllers\Api\V1\User;

use App\Http\Controllers\Api\V1\Controller;
use App\Http\Resources\Admin\ReportResource;
use App\Models\Report;
use App\Models\Book;
use App\Traits\ApiResponser;

class ReportController extends Controller
{
    use ApiResponser;

    public function store(Book $book)
    {
        if (Report::where('book_id', $book->id)->where('user_id', auth()->id())->exists()) {
            return $this->error('This book is already reported');
        }
    }
}
