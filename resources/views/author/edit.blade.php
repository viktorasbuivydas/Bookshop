@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                
                <div class="card-header d-flex justify-content-between align-items-center"><a href="{{route('authors')}}" class="btn btn-primary">Back</a> Edit Author</div>
                @if(session('success'))
                    <div class="alert alert-success m-2">
                        {{ session('success') }}
                    </div>
                @endif
                <div class="card-body">
                   <form method="POST" action="{{ route('author.update', $author->id) }}" >
                    @method('PUT')
                       @csrf
                        <div class="form-group row">
                            <label for="author" class="col-md-4 col-form-label text-md-right">Author</label>

                            <div class="col-md-6">
                                <input id="author" value="{{ $author->author }}" type="text" class="form-control @error('author') is-invalid @enderror" name="author" required autocomplete="author">

                                @error('author')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-2 offset-md-10">
                                <button type="submit" class="btn btn-primary">
                                    Update
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
