@extends('layouts.master')
@section('title', 'Hotel Settings')
@section('content')
    <div class="row">
        <div class="col-md-4">
            <x-legacy.settings.settings-navigation/>
        </div>

        <div class="col-md-8">
            <div class="legacy-box">
                <div class="heading">{{ __('User settings') }}</div>
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
                        <form method="post">
                            <div class="form-group">
                                <label for="hotelview">{{ __('Me page Hotel View') }}</label><br>
                                <div class="options hotelview">
                                    @foreach ($hview as $view)
                                        <input type="radio"
                                               id="{{ $view->getFilename() }}"
                                               name="hotelview"
                                             @if(auth()->user()->hotelview == $view->getFilename()) checked @endif
                                               value="{{ $view->getFilename() }}"
                                        />

                                        <label for="{{ $view->getFilename() }}"
                                               style="background-image:url(/goldfish/images/me/views/{{ $view->getFilename() }});"
                                        ></label>
                                    @endforeach
                                </div>
                                <label for="hotelview">{{ __('Profile Background') }}</label>
                                <div class="options hotelview">
                                    {{-- TODO: Refactor weird var names --}}
                                    @foreach ($pbg as $bg)
                                        <input type="radio"
                                               id="{{ $bg->getFilename() }}"
                                               name="background"
                                               @if( auth()->user()->profile_background == $bg->getFilename()) checked @endif
                                               value="{{ $bg->getFilename() }}"
                                        />
                                        <label for="{{ $bg->getFilename() }}"
                                               style="background-image:url(/images/profile_backgrounds/{{$bg->getFilename()}});"></label>
                                    @endforeach
                                </div>
                            </div>
                            <button type="submit" name="submit">{{ __('Save Settings') }}</button>
                            @csrf
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
