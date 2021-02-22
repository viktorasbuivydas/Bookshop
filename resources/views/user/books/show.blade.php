@extends('layouts.app')

@section('content')
    <div class="container">
        @if(session('error'))
            <div class="alert alert-danger m-2">
                {{ session('error') }}
            </div>
        @endif
        @if(session('success'))
            <div class="alert alert-success m-2">
                {{ session('success') }}
            </div>
        @endif
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header dark text-white d-flex justify-content-between align-items-center">
                        {{ $book->title }}
                        <form action="{{ route('user.reports.store', $book) }}" method="POST">
                            @csrf
                            <button class="btn btn-danger text-white mx-2">Report this book</button>
                        </form>

                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-5">
                                <img width="300" src="{{ $book->coverImagePath }}">
                            </div>
                            <div class="col-md-7">
                                <h2>Description</h2>
                                <hr>
                                {{$book->description}}
                            </div>
                        </div>

                        <div class="row my-3">
                            <div class="col-md-12">
                                Author:
                                @foreach($book->authors as $author)
                                    <p class="btn btn-primary">
                                        {{ $author->author }}
                                    </p>
                                @endforeach
                            </div>
                        </div>
                        <div class="row my-3">
                            <div class="col-md-12">
                                Genre:
                                @foreach($book->genres as $genre)
                                    <p class="btn btn-primary">
                                        {{ $genre->genre }}
                                    </p>
                                @endforeach
                            </div>
                        </div>
                        <div class="row">
                            @forelse($book->reviews as $review)
                                <div class="card">
                                    <div class="card-header">
                                        Rating:
                                        @for($i=0; $i<5; $i++)
                                            @if($i < $review->rating)
                                                <span data-rating="1"><i class="fas fa-star"></i></span>
                                            @else
                                                <span data-rating="1"><i class="far fa-star"></i></span>
                                            @endif
                                        @endfor
                                    </div>
                                    <div class="card-body">
                                        <h5 class="card-title">Review</h5>
                                        <p class="card-text">{{ $review->review }}</p>
                                    </div>
                                </div>
                            @empty
                                <div class="alert alert-danger m-2">
                                    No reviews were found
                                </div>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
        </div>

@endsection
