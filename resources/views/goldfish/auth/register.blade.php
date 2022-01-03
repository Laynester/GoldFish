@extends('layouts.base')
@section('title', 'Register')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-9">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body position-relative w-100" style="z-index: 10; overflow: hidden">
                    <form method="POST" action="{{ route('register') }}" style="position: relative; z-index: 10;">
                        @csrf

                        <div class="d-grid gap-3">
                            <div class="form-group row">
                                <label for="username">{{ __('Username') }}</label>

                                <div class="col-md-6">
                                    <input type="text" id="username" name="username" class="form-control @error('username') is-invalid @enderror" value="{{ old('username') }}" autocomplete="username" autofocus required>

                                    @error('username')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="email">{{ __('E-Mail Address') }}</label>

                                <div class="col-md-6">
                                    <input type="email" id="mail" name="mail" class="form-control @error('mail') is-invalid @enderror" value="{{ old('mail') }}" autocomplete="email" required>

                                    @error('mail')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password">{{ __('Password') }}</label>

                                <div class="col-md-6">
                                    <input type="password" id="password" name="password" class="form-control @error('password') is-invalid @enderror" required>

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password-confirm">{{ __('Confirm Password') }}</label>

                                <div class="col-md-6">
                                    <input type="password" id="password-confirm" name="password_confirmation" class="form-control" required>
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6">
                                    <button type="submit" class="goldfish_green_button w-100">
                                        {{ __('Register') }}
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>

                    <div class="d-flex justify-content-end" style="position:absolute; top: 0; left: 200px; z-index: 0;">
                        <img src="{{ asset('assets/goldfish/images/hotel.png') }}" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
