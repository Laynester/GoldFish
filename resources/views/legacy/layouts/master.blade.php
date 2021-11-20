<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{CMSHelper::settings('hotelname')}} - @yield('title')</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="{{ asset('goldfish/css/discord.css') }}?v={{CMSHelper::settings('cacheVar')}}" rel="stylesheet">
    <link href="{{ asset('legacy/css/legacy.css') }}?v={{CMSHelper::settings('cacheVar')}}" rel="stylesheet">
    <link href="//code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" rel="stylesheet">
    <script src="{{ asset('js/app.js') }}?v={{CMSHelper::settings('cacheVar')}}"></script>
    <script
            src="https://code.jquery.com/jquery-3.4.0.min.js"
            integrity="sha256-BJeo0qm959uMBGb65z40ejJYGSgR7REI4+CW1fNKwOg="
            crossorigin="anonymous"></script>
    <script
            src="https://code.jquery.com/ui/1.10.3/jquery-ui.min.js"
            integrity="sha256-lnH4vnCtlKU2LmD0ZW1dU7ohTTKrcKP50WA9fa350cE="
            crossorigin="anonymous"></script>
    @yield('css')
</head>
<body>

<style>
    a.green {
        border: 2px solid #fff;
        font-size: 16px;
        padding: 10px 20px;
        border-radius: 6px;
        height: 46px;
        line-height: 18px;
        margin: auto;
    }
</style>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <div class="legacy-body">
                <header class="d-flex justify-content-between" style="background-image:url(/goldfish/images/me/views/{{(Auth()->User() ? Auth()->User()->hotelview  : 'view_ca_wide.png')}});">
                    <a href="/me" class="logo flex-shrink-1">
                        <img src="{{CMSHelper::settings('site_logo')}}"/>
                        <span class="legacy-online d-none d-md-block">
                            <span id="onlinecount">{{CMSHelper::online()}}</span>
                            Online Now
                        </span>
                    </a>

                    <div class="d-flex flex-column flex-md-row h-full align-items-center mr-4" style="gap: 1rem;">
                        <a class="faux-button green header-btn d-flex align-items-center" href="{{ route('nitro.index') }}" target="_blank">
                            Nitro
                        </a>
                        <a class="faux-button green header-btn d-flex align-items-center" href="{{ route('game.index') }}" target="_blank">
                            Flash
                        </a>
                    </div>

                    @include('components.navbar')
                </header>
                @yield('content')
            </div>
            @include('components.footer')
        </div>
    </div>
</div>
</body>
</html>
