@extends('layouts.app')

@section('content')
</style>
<div class="container justify-content-center">
    <div class="row">
            @forelse($books as $book)
                <div class="col-lg-3 col-md-4 col-sm-6 col-6 my-2">
                    <div class="card">
                        <img src="/storage/uploads/images/{{ $book->cover_image_url }}" class="card-img-top" alt="...">
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
            
            
           
    </div>
</div>
@endsection
