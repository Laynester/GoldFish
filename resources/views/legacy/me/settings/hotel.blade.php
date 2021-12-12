@extends('layouts.master')

@section('title', 'Hotel Settings')

@section('content')
    <div class="row">
        <div class="col-md-4">
            <x-legacy.settings.settings-navigation/>
        </div>

        <div class="col-md-8">
            <div class="legacy-box">
                <div class="heading">{{ __('User hotel views') }}</div>
                <div class="content settings">
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

                    <div class="row justify-content-center">
                        <form method="post" action="{{ route('settings.hotel.update') }}">
                            @csrf

                            <div class="form-group">
                                <div class="options hotelview">
                                    @foreach ($hotelViews as $hotelview)
                                        <input type="radio"
                                               id="{{ $hotelview->getFilename() }}"
                                               name="hotel_view"
                                               @if(auth()->user()->hotelview == $hotelview->getFilename()) checked
                                               @endif
                                               value="{{ $hotelview->getFilename() }}"
                                        />

                                        <label for="{{ $hotelview->getFilename() }}"
                                               style="background-image:url(/goldfish/images/me/views/{{ $hotelview->getFilename() }});"></label>
                                    @endforeach
                                </div>
                            </div>

                            <div class="d-flex justify-content-end mt-3">
                                <button type="submit" name="submit">{{ __('Update hotel view') }}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="legacy-box mt-3">
                <div class="heading">{{ __('Profile backgrounds') }}</div>
                <div class="content settings">
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
                    <div class="row justify-content-center">
                        <form method="post" action="{{ route('settings.hotel.update') }}">
                            @csrf

                            <div class="form-group">
                                <div class="options hotelview">
                                    @foreach ($profileBackgrounds as $profileBackground)
                                        <input type="radio"
                                               id="{{ $profileBackground->getFilename() }}"
                                               name="profile_background"
                                               @if( auth()->user()->profile_background == $profileBackground->getFilename()) checked
                                               @endif
                                               value="{{ $profileBackground->getFilename() }}"
                                        />
                                        <label for="{{ $profileBackground->getFilename() }}"
                                               style="background-image:url(/images/profile_backgrounds/{{$profileBackground->getFilename()}});"></label>
                                    @endforeach
                                </div>
                            </div>

                            <div class="d-flex justify-content-end mt-3">
                                <button type="submit" name="submit">{{ __('Update profile background') }}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
