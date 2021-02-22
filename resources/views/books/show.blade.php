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
                    @if(!$book->reviews->contains('user_id', Auth::id()))
                        <form action="{{ route('user.reviews.store') }}" method="POST">
                            @csrf
                            <div class="row text-center">
                                <div class="col-md-12">
                                    <div class="reviewStars">
                                        Rate book:
                                        <span data-rating="1"><i class="far fa-star"></i></span>
                                        <span data-rating="2"><i class="far fa-star"></i></span>
                                        <span data-rating="3"><i class="far fa-star"></i></span>
                                        <span data-rating="4"><i class="far fa-star"></i></span>
                                        <span data-rating="5"><i class="far fa-star"></i></span>
                                    </div>

                                </div>
                            </div>
                            @error('rating')
                            <div class="row my-3">
                                        <small>
                                            <strong class="text-danger text-sm-left">{{ $message }}</strong>
                                        </small>
                            </div>
                            @enderror

                            <input type="hidden" name="book_id" value="{{ $book->id }}"/>
                            <input type="hidden" name="rating" id="rating" value="0"/>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="review">Book review</label>
                                        <textarea class="form-control @error('review') is-invalid @enderror" name="review" id="review" rows="5"></textarea>
                                        @error('review')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <button class="btn btn-primary" type="submit">Send a review</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    @endif
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
    <script src="{{ asset('src/js/rating.js') }}"></script>
@endsection
