@extends('installation.layouts.installation-layout')

@section('step', '3')

@section('content')
    <div class="row px-3">
        <div class="col-lg-6">
            <div class="box grey">
                <p>
                    {{ __('Fill in your hotels social platform information, this will display tweets from your account, and display
                    a discord widget with your hotel server.') }}
                </p>
            </div>
        </div>

        <div class="col-lg-6">
            <form method="post" action="{{ route('installation.step.update', 3) }}">
                @csrf

                <div class="box">
                    <h2>Social Configuration</h2>

                    <div class="form-group">
                        <label for="title">Discord Widget ID:</label>
                        <input class="inputs"
                               type="text"
                               value="{{ CMSHelper::settings('discord_id') }}"
                               name="discord_id"/>
                    </div>

                    <div class="form-group">
                        <label for="title">Twitter Handle:</label>
                        <input class="inputs"
                               type="text"
                               value="{{ CMSHelper::settings('twitter_handle') }}"
                               name="twitter_handle"/>
                    </div>
                </div>

                <span class="controls">
                    <button class="green" type="submit">{{ __('Continue') }}</button>
                    <a class="red" href="{{ route('installation.step', 2) }}">{{ __('Back') }}</a>
                </span>
            </form>
        </div>
    </div>
@endsection
