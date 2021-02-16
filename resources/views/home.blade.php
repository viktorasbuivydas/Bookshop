@extends('layouts.app')

@section('content')
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="page-breadcrumb">
        <div class="row align-items-center">
            <div class="col-5">
                <h4 class="page-title">My Books</h4>
                <div class="d-flex align-items-center">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('home')}}">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">My books</li>
                        </ol>
                    </nav>
                </div>
            </div>

        </div>
    </div>
    <!-- ============================================================== -->
    <!-- End Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Container fluid  -->
    <!-- ============================================================== -->
    <div class="container-fluid">
        <!-- ============================================================== -->
        <!-- Start Page Content -->
        <!-- ============================================================== -->
        <div class="row">
            <div class="col-12">
                        <div class="row">
                            @forelse($books as $book)
                                <div class="col-lg-3 col-md-4 col-sm-6 col-6 my-2">
                                    <div class="card">
                                        <a href="{{ route('books.show', $book)}}">
                                            <img src="/storage/uploads/images/{{ $book->cover_image_url }}" class="card-img-top" alt="...">
                                        </a>
                                        <div class="card-body">
                                            <h5 class="card-title">Title: {{ $book->title }}</h5>
                                            <p class="card-text">Author: {{ $book->author }}</p>
                                            <p class="card-text">Price: {{ $book->price}}$</p>
                                        </div>
                                    </div>
                                </div>
                            @empty
                                <div class="col-lg-12 text-center my-5 py-3 alert alert-danger center-block">No data found </div>
                            @endforelse


                        {{ $books->links() }}
                        </div>
            </div>
        </div>

@endsection
