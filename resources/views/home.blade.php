@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <ul>
                            <li><a href="{{route('mybooks')}}">My Books</a></li>
                        </ul>
                        @admin
                                <p>Admin</p>
                            <ul>
                                <li><a href="{{route('genres')}}">Genres</a></li>
                                <li><a href="{{route('authors')}}">Authors</a></li>
                                <li><a href="{{route('reviews')}}">Reviews</a></li>
                                <li><a href="{{route('reports')}}">Reports</a></li>
                            </ul>
                        @endadmin
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
