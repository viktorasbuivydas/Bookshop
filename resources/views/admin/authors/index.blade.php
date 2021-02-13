@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                
                <div class="card-header d-flex justify-content-between align-items-center">
                    <a href="{{route('home')}}" class="btn btn-primary">Back</a> 
                    Authors 
                    <a href="{{route('admin.authors.create')}}" class="btn btn-primary">Create</a>
                </div>
                @if(session('success'))
                    <div class="alert alert-success m-2">
                        {{ session('success') }}
                    </div>
                @endif
                <div class="card-body">
                        @if(count($authors)>0)
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">Author</th>
                                <th scope="col">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                        @endif
                        @forelse($authors as $author)
                            <tr>
                                <th>{{ $author->author }}</th>
                                <td class="d-flex">
                                    <a href="{{ route('admin.authors.edit', $author->id) }}" class="btn btn-warning mx-2">Edit</a>
                                    <form action=" {{ route('admin.authors.destroy', $author->id) }}" method="POST">
                                        @method('DELETE')
                                        @csrf
                                        <button class="btn btn-danger mx-2">Delete</button>
                                    </form>
                                </td>
                                    
                            </tr>
                        @empty 
                        <div class="alert alert-danger m-2">
                            No data found
                        </div>
                        @endforelse
                    </tbody>
                    </table>
                    {{ $authors->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
