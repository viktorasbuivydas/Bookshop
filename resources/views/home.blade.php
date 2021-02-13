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
                            <li><a href="{{route('user.books.index')}}">My Books</a></li>
                        </ul>
                        @admin
                                <p>Admin</p>
                            <ul>
                                <li><a href="{{route('admin.genres.index')}}">Genres</a></li>
                                <li><a href="{{route('admin.authors.index')}}">Authors</a></li>
                                <li><a href="{{route('admin.reviews.index')}}">Reviews</a></li>
                                <li><a href="{{route('admin.reports.index')}}">Reports</a></li>
                            </ul>
                        @endadmin
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
