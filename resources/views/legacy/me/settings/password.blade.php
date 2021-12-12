@extends('layouts.master')
@section('title', 'Account Settings')
@section('content')
    <div class="row">
        <div class="col-md-4">
            <x-legacy.settings.settings-navigation/>
        </div>

        <div class="col-md-8">
            <div class="legacy-box">
                <div class="heading">{{ __('Password settings') }}</div>
                <div class="content settings">
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

                    <div class="row justify-content-center">
                        <div class="col-lg-12">
                            <form id="form-change-password" role="form" method="POST" action="{{ route('settings.password.update') }}" class="form-horizontal">
                                @csrf

                                <label for="current-password">{{ __('Current Password') }}</label>
                                <div class="form-group">
                                    <input type="password" class="form-control" id="current-password"
                                           name="current_password"
                                           placeholder="Password">
                                </div>

                                <label for="password">{{ __('New Password') }}</label>
                                <div class="form-group">
                                    <input type="password" class="form-control" id="password" name="password"
                                           placeholder="{{ __('Password') }}">
                                </div>

                                <label for="password_confirmation">{{ __('Confirm new password') }}</label>
                                <div class="form-group">
                                    <input type="password" class="form-control" id="password_confirmation"
                                           name="password_confirmation" placeholder="{{ __('Confirm new password') }}">
                                </div>

                                <div class="form-group d-flex justify-content-end mt-3">
                                    <button type="submit">{{ __('Update password') }}</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection
