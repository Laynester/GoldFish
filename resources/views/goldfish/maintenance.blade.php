@extends('layouts.base')

@section('title', 'Maintenance')

@section('content')
    <div class="container">
        <div class="row d-flex w-full justify-content-center">
            <div class="col-lg-8">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        @foreach ($errors->all() as $error)
                            {{ $error }}
                        @endforeach
                    </div>
                @endif

                <div class="card">
                    <div class="card-header">
                        <h2 class="text-center">{{ __('Maintenance!') }}</h2>
                    </div>

                    <div class="card-body position-relative w-100" style="z-index: 10;">
                        <div class="d-flex justify-content-between">
                            <div style="width: 50%;">
                                <strong>
                                    {{ __(':hotelname is currently in maintenance!', ['hotelname' => CMSHelper::settings('hotelname')]) }}
                                </strong>

                                <p class="mt-2">{{ __('Do not worry! We are working very hard on improving the hotel, and will be back very soon!') }}</p>
                                <p>
                                    {{ __('Please check back in later - You can also join our discord if you arent a member already, to get the latest news and updates.') }}
                                </p>

                                <a href="{{ CMSHelper::settings('discord_invitation_link') }}" target="_blank">{{ __('Click here to join our discord') }}</a>
                            </div>
                            <img style="width: 35%;" src="{{ asset('images/maintenance.png') }}" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
