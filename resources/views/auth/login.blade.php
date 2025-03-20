@extends('layouts.front')

@section('content')
    <div class="container login-card">
        <div class="row justify-content-center">
            <div class="col-3"></div>
            <div class="col-md-6 col-12">
                <div class="card shadow-lg mb-4 ">
                    <div class="card-header login-header">
                        <h2 class="text-center">LOGIN</h2>
                    </div>
                    <div class="card-body ">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="row mb-3 justify-content-center">
                                <div class="col-md-6">
                                    <input placeholder="Email Address" id="email" type="email"
                                        class="form-control @error('email') is-invalid @enderror" name="email"
                                        value="{{ old('email') }}" required autocomplete="email" autofocus>
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3 justify-content-center">
                                <div class="col-md-6">
                                    <input placeholder="Password" id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        required autocomplete="current-password">
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-0">
                                <div class="col-md-12 text-center">
                                    <button type="submit" class="btn btn-primary btn-login">
                                        {{ __('Login') }}
                                    </button>
                                </div>
                            </div>
                            {{-- <div class="row mt-2">
                                <div class="col-md-12 text-center">
                                    @if (Route::has('password.request'))
                                        <a class="btn btn-link" href="{{ route('password.request') }}">
                                            {{ __('Forgot Your Password?') }}
                                        </a>
                                    @endif
                                </div>
                            </div> --}}
                            <div class="row mt-2">
                                <div class="col-md-12 text-center">
                                    <a class="btn btn-link" href="{{ route('register') }}">
                                        Not yet Registered? Register
                                    </a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-3"></div>
        </div>
    </div>
@endsection
