@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header dark text-white d-flex justify-content-between align-items-center">
                    {{$book->title}}
                    <a href="" class="btn btn-danger text-white">Report this book</a>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-3">
                            <img width="200" src="/storage/uploads/images/{{$book->cover_image_url}}">
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
                        </div>
                    </div>
                    <div class="row my-3">
                        <div class="col-md-12">
                            Genre:
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
</div>
@endsection
