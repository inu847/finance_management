@extends('layouts.auth')

@section('title')
    Login
@endsection

@section('content')
    <div class="account-box">
        <div class="account-logo-box">
            <div class="text-center">
                <a href="index.html">
                    <img src="{{ asset('assets/images/logo-dark.png')}}" alt="" height="30">
                </a>
            </div>
            <h5 class="text-uppercase mb-1 mt-4">Sign In</h5>
            <p class="mb-0">Login to your Admin account</p>
        </div>

        <div class="account-content mt-4">
            <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                @csrf

                <div class="form-group row">
                    <div class="col-12">
                        <label for="emailaddress">Email address</label>
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autofocus>

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-12">
                        <label for="password">Password</label>
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-12">

                        <div class="checkbox checkbox-success">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                            <label for="remember">
                                Remember me
                            </label>
                        </div>

                    </div>
                </div>

                <div class="form-group row text-center mt-2">
                    <div class="col-12">
                        <button class="btn btn-md btn-block btn-primary waves-effect waves-light" type="submit">Sign In</button>
                    </div>
                </div>

            </form>

        </div>
    </div>
@endsection
