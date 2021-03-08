<?php

namespace App\Http\Controllers\Api\V1\Admin;
use App\Http\Controllers\Api\V1\Controller;
use App\Http\Resources\Admin\ReportResource;
use App\Models\Report;

class ReportController extends Controller
{

    public function index()
    {
        $reports = Report::all();
        return ReportResource::collection($reports);
    }
}
