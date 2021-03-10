<?php

namespace App\Http\Controllers\Api\V1\User;

use App\Http\Controllers\Api\V1\Controller;
use App\Http\Requests\ReportRequest;
use App\Models\Report;
use App\Traits\ApiResponser;

class ReportController extends Controller
{
    use ApiResponser;

    public function store(ReportRequest $request)
    {
        if (Report::userReport($request->book_id)->exists()) {
            return $this->error('You already reported this book', 400);
        }
        Report::create($request->validated());
        return $this->success('Succesfully reported this book');
    }
}

