@extends('installation.layouts.installation-layout')

@section('step', '1')

@section('content')
    <div class="row px-3 justify-content-center">
        <div class="col-lg-9">
            @if(!$connection)
                <div class="box red text-center">
                    <p>{{ __('Hey! You have not set up your .env file! You must fill out your database information before continuing!') }}</p>
                </div>
            @elseif(!$hasDatabase)
                <div class="box red text-center">
                    <p>{{ __('Hey! You need an existing arcturus database...') }}</p>
                </div>

                <span class="controls">
                    <a class="green w-100" href="{{ route('installation.index') }}">{{ __('Reload') }}</a>
                </span>
            @else
                <div class="box grey text-center">
                    <p>
                        {{ __('Welcome to goldfish! To begin, please press continue, please note, this will not remove any existing
                        hotel data, this will only insert new database tables relating to goldfish. If you need some help or are
                        confused, you can join the') }}
                        <a href="https://discordapp.com/invite/eVAYDUp">{{ __('Discord Server') }}</a>
                    </p>

                    <p>
                        {{ __('Remember, all information you input, can be changed later through the database or through your hotel housekeeping.') }}
                    </p>
                </div>

                <span class="controls">
                    <form method="post">
                        @csrf

                        <button class="green right mt-2" type="submit">{{ __('Continue') }}</button>
                    </form>
                </span>
            @endif
        </div>
    </div>
@endsection
