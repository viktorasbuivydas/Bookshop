@extends('layouts.app')

@section('content')
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="page-breadcrumb">
        <div class="row align-items-center">
            <div class="col-5">
                <h4 class="page-title">Stats</h4>
                <div class="d-flex align-items-center">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('home')}}">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Stats</li>
                        </ol>
                    </nav>
                </div>
            </div>

        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="card text-white text-center bg-success mb-4">
                                    <div class="card-body">
                                        <h4 class="card-title">Approved books <b>10</b></h4>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="card text-white text-center bg-warning mb-4">
                                    <div class="card-body">
                                        <h4 class="card-title">Pending books <b>10</b></h4>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="card text-white text-center bg-danger mb-4">
                                    <div class="card-body">
                                        <h4 class="card-title">Rejected books <b>10</b></h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card mb-4">
                            <div class="card-body text-muted">
                                <h5 class="card-title">Search history</h5>
                                <p class="card-text">
                                    <ul>
                                        <li>
                                            test
                                        </li>
                                    </ul>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

@endsection
