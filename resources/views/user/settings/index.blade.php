@extends('layouts.app')

@section('content')
    <div class="page-breadcrumb">
        <div class="row align-items-center">
            <div class="col-5">
                <h4 class="page-title">Settings</h4>
                <div class="d-flex align-items-center">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('home')}}">Settings</a></li>
                            <li class="breadcrumb-item active" aria-current="page">My settings</li>
                        </ol>
                    </nav>
                </div>
            </div>

        </div>
    </div>
    <div class="container-fluid">

        <div class="form-group row">
            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Email') }}</label>

            <div class="col-md-6">
                <input id="email" type="text" class="form-control @error('email') is-invalid @enderror" name="email" required autocomplete="new-email" placeholder="{{ Auth::user()->email }}">

                @error('email')
                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

            <div class="col-md-6">
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="old-password">

                @error('password')
                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                @enderror
            </div>
            <div class="col-md-1 m-auto mx-1">
                <a onClick="togglePassword('password')"><i class="fas fa-eye"></i></a>
            </div>
        </div>

        <div class="form-group row">
            <label for="new_password" class="col-md-4 col-form-label text-md-right">{{ __('New Password') }}</label>

            <div class="col-md-6">
                <input id="new_password" type="password" class="form-control @error('new_password') is-invalid @enderror" name="new_password" required autocomplete="new-password">

                @error('new_password')
                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                @enderror
            </div>
            <div class="col-md-1 m-auto mx-1">
                <a onClick="togglePassword('new_password')"><i class="fas fa-eye"></i></a>
            </div>
        </div>
        <div class="form-group row mb-0">
            <div class="col-md-12">
                <button type="submit" class="btn btn-primary btn-block">
                    {{ __('Update data') }}
                </button>
            </div>
        </div>
    </div>
    <script src="{{ asset('src/js/password.js')}}"></script>
@endsection
