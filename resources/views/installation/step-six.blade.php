@extends('installation.layouts.installation-layout')

@section('step', '6')

@section('content')
    <div class="col-lg-12">
        <div class="box green p-4">
            <h2 class="text-center mb-4">{{ __('You made it! GoldFish installed successfully!') }}</h2>

            <p>
                {{ __('Remember you can change all of the settings, that you have just provided by editing them through the database, or your hotel housekeeping.') }}
            </p>
        </div>

        <form method="post" action="{{ route('installation.step.update', 6) }}">
            @csrf

            <span class="controls">
                <button class="green right mt-4" type="submit">{{ __('Take me to my site!') }}</button>
            </span>
        </form>
    </div>
@endsection
