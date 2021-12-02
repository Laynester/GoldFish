@extends('layouts.processor')
@section('title', 'Login')
@section('content')
    <div class="col-md-4">
        <div class="legacy-box blue">
            <div class="heading">{{ __('Sign in') }}</div>
            <div class="content">
                <form method="POST" id="loginForm" action="{{ route('login.store') }}">
                    @csrf

                    <div class="form-group">
                        <input id="username" placeholder="Username" type="text" name="username"
                               value="{{ old('username') }}" required autocomplete="username" autofocus>
                    </div>

                    <div class="form-group">
                        <input id="password" placeholder="Password" type="password" name="password" required
                               autocomplete="current-password">
                    </div>

                    <div class="form-group">
                        <button class="black login" type="submit">Login</button>
                    </div>
                </form>
                <a href="{{ route('register') }}">
                    <button class="green register">New here? Join now!</button>
                </a>

            </div>
        </div>
    </div>
@endsection
