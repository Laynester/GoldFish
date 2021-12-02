<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{CMSHelper::settings('hotelname')}} - @yield('title')</title>


    <link href="{{ asset('goldfish/css/bootstrap.min.css') }}?v={{CMSHelper::settings('cacheVar')}}" rel="stylesheet">
    <link href="{{ asset('goldfish/css/discord.css') }}?v={{CMSHelper::settings('cacheVar')}}" rel="stylesheet">
    <link href="{{ asset('goldfish/css/goldfish.css') }}?v={{CMSHelper::settings('cacheVar')}}" rel="stylesheet">
    <link href="{{ asset('goldfish/css/goldfish_overwrite.css') }}?v={{CMSHelper::settings('cacheVar')}}"
          rel="stylesheet">
    <link href="//code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" rel="stylesheet">

    <script src="{{ asset('goldfish/js/bootstrap.min.js') }}?v={{CMSHelper::settings('cacheVar')}}" defer></script>
    <script src="{{ asset('js/app.js') }}?v={{CMSHelper::settings('cacheVar')}}" defer></script>
    <script
            src="https://code.jquery.com/jquery-3.4.0.min.js"
            integrity="sha256-BJeo0qm959uMBGb65z40ejJYGSgR7REI4+CW1fNKwOg="
            crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
</head>
<body>
<div id="page-wrap">
    <div class="header">
        @guest
            <body class="guest">
            <div class="login-section">
                <div class="container">
                    <div class="login-inputs">
                        <form method="POST"
                              id="loginForm" {{ CMSHelper::settings('maintenance') == 0 ? 'action='.route('login.store') : '' }}>
                            @csrf

                            <div class="login-input">
                                <input
                                    id="username"
                                    type="text"
                                    name="username"
                                    class="form-control input @error('username') is-invalid @enderror"
                                    value="{{ old('username') }}"
                                    autocomplete="username"
                                    autofocus
                                    required
                                >
                            </div>
                            <div class="login-input">
                                <input
                                    id="password"
                                    type="password"
                                    name="password"
                                    class="form-control input @error('password') is-invalid @enderror"
                                    autocomplete="current-password"
                                    required
                                >
                            </div>

                            <button type="submit" id="login" class="btn btn-primary">
                                {{ __('Login') }}
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        @endguest
        <div class="container relative">
            <div class="logo">
                <a href="{{ route('me.index') }}" class="left"><img src="{{CMSHelper::settings('site_logo')}}"/></a>
                <div class="online no-mobile"><span id="onlinecount">{{CMSHelper::online()}}</span> Online Now</div>
            </div>
            <div class="right @guest regbutton @endguest">
                @auth
                    <ul class="header_options">
                        <li class="settings left" onclick="window.location.href='/user/settings'"></li>

                        <a href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                            <li class="logout left" id="logout">
                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                      style="display: none;">
                                    @csrf
                                </form>
                            </li>
                        </a>
                    </ul>
                    <div class="userinfo no-mobile">
                        <div class="purse">
                            <p class="credits currency">
                                {{ auth()->user()->credits ?? 0 }}
                            </p>
                            <p class="duckets currency">
                                {{ auth()->user()->duckets->amount ?? 0 }}
                            </p>
                            <p class="diamonds currency">
                                {{ auth()->user()->diamonds->amount ?? 0 }}
                            </p>
                        </div>
                        <div class="cut_avatar">
                            <img src="{{ CMSHelper::settings('habbo_imager') }}{{ auth()->user()->look }}&action=wav&direction=3&head_direction=3">
                        </div>
                    </div>
                @else
                    <a class="register_button" href="{{ route('register') }}">
                        {{ __('Join now!') }}
                    </a>
                @endauth
            </div>
        </div>
    </div>

    @include('partials.navbar')

    <main class="py-4">
        @yield('content')
    </main>
</div>
<x-footer/>
</body>
</html>
