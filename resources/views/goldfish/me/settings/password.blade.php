@extends('layouts.base')

@section('title', 'Account Settings')

@section('content')
<div class="container">
    <div class="row">
        <x-goldfish.settings-navigation/>
        <div class="col-lg-8">
            <div class="box black">
                <div class="heading">{{ __('Account Settings') }}</div>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                @if (Session::has('success'))
                    <div class="alert alert-success">{{ Session::get('success') }}</div>
                @endif

                <div class="row">
                    <form id="form-change-password" role="form" method="POST" action="{{ route('settings.password.update') }}" class="form-horizontal">
                        @csrf

                        <div class="d-grid gap-2">
                            <label for="current-password">{{ __('Current Password') }}</label>
                            <div class="form-group">
                                <input type="password"
                                       class="form-control"
                                       id="current-password"
                                       name="current_password"
                                       placeholder="{{ __('Password') }}"
                                >
                            </div>

                            <label for="password">{{ __('New Password') }}</label>
                            <div class="form-group">
                                <input type="password"
                                       class="form-control"
                                       id="password"
                                       name="password"
                                       placeholder="{{ __('Password') }}"
                                >
                            </div>

                            <label for="password_confirmation">{{ __('Re-enter Password') }}</label>
                            <div class="form-group">
                                <input type="password"
                                       class="form-control"
                                       id="password_confirmation"
                                       name="password_confirmation"
                                       placeholder="{{ __('Re-enter Password') }}"
                                >
                            </div>

                            <div class="form-group">
                                <button type="submit" class="goldfish_green_button w-100 mt-4">{{ __('Submit') }}</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
