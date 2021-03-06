<?php

namespace App\Http\Controllers\Api\V1\Admin;
use App\Http\Controllers\Api\V1\Controller;
use App\Models\Report;

class ReportController extends Controller
{

    public function index()
    {
        $reports = Report::all();
        return view('admin.reports.index', compact('reports'));
    }

    public function create()
    {
        return view('report.create');
    }

}
