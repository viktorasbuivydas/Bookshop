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
                            <div class="col-md-3">
                                <img width="200" src="/storage/uploads/images/{{ $book->cover_image_url }}">
                            </div>
                            <div class="col-md-9">
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
                            <div class="col-md-12">
                                Rating: 4.5
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                Write a review
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

@endsection
