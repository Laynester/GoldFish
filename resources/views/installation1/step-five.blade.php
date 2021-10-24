@extends('installation.layouts.installation-layout')

@section('step', '5')

@section('content')
    <div class="row px-3">
        <div class="col-lg-6">
            <div class="box grey">
                <p>
                    {{ __('Create a new account') }}
                </p>

                <p>
                    {{ __('Here, you can create an admin account, or if you already have an account, you can choose to skip this step.') }}
                </p>
            </div>

            <a class="text-center d-block" href="{{ route('installation.step', 6) }}">
                {{ __('Already have an account? Skip this step.') }}
            </a>
        </div>

        <div class="col-lg-6">
            <form method="post" action="{{ route('installation.step.update', 5) }}">
                @csrf

                <div class="box">
                    <h2>{{ __('Administrator Account') }}</h2>

                    <div class="form-group">
                        <label>{{ __('Username:') }}</label>
                        <input class="inputs"
                               type="text"
                               name="username"
                               placeholder="{{ __('Enter a username') }}">
                    </div>

                    <div class="form-group">
                        <label>{{ __('Password:') }}</label>
                        <input class="inputs"
                               type="password"
                               name="password"
                               placeholder="{{ __('Password') }}">
                    </div>

                    <div class="form-group">
                        <label>{{ __('Confirm Password:') }}</label>
                        <input class="inputs"
                               type="password"
                               name="password_confirmation"
                               placeholder="{{ __('Confirm password') }}">
                    </div>

                    <div class="form-group">
                        <label>{{ __('Email:') }}</label>
                        <input class="inputs"
                               type="email" name="mail"
                               placeholder="{{ __('Enter your email') }}">
                    </div>
                </div>

                <span class="controls">
                    <button class="green" type="submit">{{ __('Continue') }}</button>
                    <a class="red" href="{{ route('installation.step', 4) }}">{{ __('Back') }}</a>
                </span>
            </form>
        </div>
    </div>
@endsection
