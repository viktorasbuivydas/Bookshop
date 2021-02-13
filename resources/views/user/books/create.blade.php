@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                
                <div class="card-header">Add Book</div>
                @if(session('success'))
                    <div class="alert alert-success m-2">
                        {{ session('success') }}
                    </div>
                @endif
                @if(session('error'))
                <div class="alert alert-danger m-2">
                    {{ session('error') }}
                </div>
            @endif
                <div class="card-body">
                   <form method="POST" action="{{ route('user.books.store') }}" enctype="multipart/form-data">
                       @csrf
                        <div class="form-group row">
                            <label for="title" class="col-md-4 col-form-label text-md-right">Book Title * </label>

                            <div class="col-md-6">
                                <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" required autocomplete="title">

                                @error('title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="description" class="col-md-4 col-form-label text-md-right">Book Description * </label>

                            <div class="col-md-6">
                                <textarea id="description" class="form-control @error('description') is-invalid @enderror" name="description" required autocomplete="description"></textarea>

                                @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right">Authors</label>
                        </div>
                        <div class="form-group row">
                            <select class="form-control" name="all_authors[]" size="5" multiple aria-label="multiple select example">
                                <option selected>Select multiple authors by holding ctrl</option>
                                @foreach($authors as $author)
                                            <option value="{{$author->id}}">{{$author->author}}</option>
                                @endforeach
                            </select>
                        </div>
                        <hr>
                        <div class="form-group row">
                            <label for="title" class="col-md-5 col-form-label text-md-right">Add new author seperate with coma</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control @error('author') is-invalid @enderror" name="author" autocomplete="author" placeholder="author1,author2,author3">

                                @error('author')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <hr>

                        <div class="form-group row">
                            <label class="col-md-6 col-form-label text-md-right">Genres</label>
                        </div>
                        <div class="form-group row">
                            <select class="form-control" name="all_genres[]" size="5" multiple aria-label="multiple select example">
                                <option selected>Select multiple genres by holding ctrl</option>
                                @foreach($genres as $genre)
                                            <option value="{{$genre->id}}">{{$genre->genre}}</option>
                                @endforeach
                            </select>
                        </div>
                        <hr>
                        <div class="form-group row">
                            <label for="genre" class="col-md-5 col-form-label text-md-right">Add new genre seperate with coma</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control @error('genre') is-invalid @enderror" name="genre" autocomplete="genre" placeholder="genre1,genre2,genre3">

                                @error('genre')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <hr>
                        <div class="form-group row">
                            <label for="price" class="col-md-4 col-form-label text-md-right">Price, $ </label>

                            <div class="col-md-6">
                                <input type="number" step="0.01" class="form-control @error('price') is-invalid @enderror" name="price" required autocomplete="price">

                                @error('price')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="discount" class="col-md-4 col-form-label text-md-right">Discount, % </label>

                            <div class="col-md-6">
                                <input type="number" step="0.01" class="form-control @error('discount') is-invalid @enderror" name="discount" required autocomplete="discount" value="0">

                                @error('discount')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="cover_image_url" class="col-md-4 col-form-label text-md-right">Book Cover * </label>

                            <div class="col-md-6">
                                <input id="cover_image_url" type="file" class="form-control @error('cover_image_url') is-invalid @enderror" name="cover_image_url" required autocomplete="cover_image_url">

                                @error('cover_image_url')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-2 offset-md-10">
                                <button type="submit" class="btn btn-primary">
                                    Create
                                </button>

                                
                            </div>
                        </div>
                   </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
