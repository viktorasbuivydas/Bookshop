@extends('layouts.app')

@section('content')
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
    <div class="container justify-content-center">
        <div class="row">
            @forelse($books as $book)
                <div class="col-lg-3 col-md-4 col-sm-6 col-6 my-2">
                    <div class="card">
                        <a href="{{ route('user.books.show', $book)}}">
                            <img src="/storage/uploads/images/{{ $book->cover_image_url }}" class="card-img-top" alt="...">
                        </a>
                        @if($book->isNew)
                            <span class="btn btn-primary new"> * NEW *</span>
                        @endif

                        @if($book->discount > 0)
                            <div class="discount">
                                <p><i class="fa fa-tag fa-lg"></i></p>
                                <p>{{ $book -> discount }} %</p>
                            </div>
                        @endif

                        <div class="card-body p-3">

                            <h5 class="card-title">Title: {{ $book->title }}</h5>
                            <p class="card-text">Author: {{ $book->authors->first()->author }}</p>
                            @if($book->discount > 0)
                                <p class="card-text text-danger h4"><del>{{ $book->price }} $</del></p>
                            @endif
                            <p class="card-text">Price: {{ $book->priceAfterDiscount }} $</p>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-lg-12 text-center my-5 py-3 alert alert-danger center-block">No data found </div>
            @endforelse
            {{ $books->links() }}
        </div>
    </div>
@endsection
