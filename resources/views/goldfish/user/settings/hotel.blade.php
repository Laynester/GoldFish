@extends('layouts.base')

@section('title', 'Hotel Settings')

@section('content')
    <div class="container">
        <div class="row">
            <x-goldfish.settings-navigation/>

            <div class="col-lg-8">
                @if($errors->any())
                    <div class="alert alert-danger" role="alert">
                        {{$errors->first()}}
                    </div>
                @endif

                @if(session('success'))
                    <div class="alert alert-success" role="alert">
                        {{session('success')}}
                    </div>
                @endif

                <div class="box black">
                    <div class="heading">{{ __('Hotel view background') }}</div>
                    <div class="row justify-content-center">
                        <form method="post" action="{{ route('settings.hotel.update') }}">
                            @csrf

                            <div class="form-group">
                                <div class="options hotelview">
                                    @foreach ($hotelViews as $hotelview)
                                        <input type="radio"
                                            id="{{ $hotelview->getFilename() }}"
                                            name="hotel_view"
                                            @if(auth()->user()->hotelview == $hotelview->getFilename()) checked @endif
                                            value="{{ $hotelview->getFilename() }}"
                                        />

                                        <label for="{{ $hotelview->getFilename() }}"
                                            style="background-image:url(/assets/goldfish/images/me/views/{{ $hotelview->getFilename() }});">
                                        </label>
                                    @endforeach
                                </div>
                            </div>

                            <button type="submit" name="submit" class="goldfish_green_button mt-3 w-100">
                                {{ __('Save hotel view') }}
                            </button>

                        </form>
                    </div>
                </div>

                <div class="box black">
                    <div class="heading">{{ __('Profile Background') }}</div>
                    <div class="row justify-content-center">
                        <form method="post" action="{{ route('settings.hotel.update') }}">
                            @csrf

                            <div class="form-group">
                                <div class="options hotelview">
                                    @foreach ($profileBackgrounds as $profileBackground)
                                        <input type="radio"
                                            id="{{$profileBackground->getFilename()}}"
                                            name="profile_background"
                                            @if(auth()->user()->profile_background == $profileBackground->getFilename()) checked @endif
                                            value="{{ $profileBackground->getFilename() }}"
                                        />

                                        <label for="{{ $profileBackground->getFilename() }}" style="background-image:url(/assets/images/profile_backgrounds/{{ $profileBackground->getFilename() }});"></label>
                                    @endforeach
                                </div>
                            </div>

                            <button type="submit" name="submit" class="goldfish_green_button mt-3 w-100">
                                {{ __('Save profile bg') }}
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
