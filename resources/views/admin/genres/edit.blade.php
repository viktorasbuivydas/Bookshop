@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">

                <div class="card-header dark d-flex justify-content-between align-items-center"><a href="{{route('admin.genres.index')}}" class="btn btn-primary">Back</a> Edit Genre</div>
                @if(session('success'))
                    <div class="alert alert-success m-2">
                        {{ session('success') }}
                    </div>
                @endif
                <div class="card-body">
                   <form method="POST" action="{{ route('admin.genres.update', $genre->id) }}" >
                    @method('PUT')
                       @csrf
                        <div class="form-group row">
                            <label for="genre" class="col-md-4 col-form-label text-md-right">Genre</label>

                            <div class="col-md-6">
                                <input id="genre" value="{{ $genre->genre }}" type="text" class="form-control @error('genre') is-invalid @enderror" name="genre" required autocomplete="genre">

                                @error('genre')
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
