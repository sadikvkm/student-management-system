@extends('layouts.auth')

@section('title', trans('pages.login'))
@section('content')
    <form method="POST" action="{{ route('login') }}">
        @csrf
        <div class="input-group mb-3">
            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
            <div class="input-group-append">
                <div class="input-group-text"> <span class="fas fa-envelope"></span> </div>
            </div>
            @error('email')
                <div class="invalid-feedback" role="alert">
                    <div>{{ $message }}</div>
                </div>
            @enderror
        </div>
        
        <div class="input-group mb-3">
            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
            <div class="input-group-append">
                <div class="input-group-text"> <span class="fas fa-lock"></span></div>
            </div>
            @error('password')
                <div class="invalid-feedback" role="alert">
                    <div>{{ $message }}</div>
                </div>
            @enderror
        </div>
        <div class="row">
            <div class="col-12">
                <x-button label="default.sign-in" type="submit" />
            </div>
        </div>
    </form>
@endsection
