<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{CMSHelper::settings('hotelname')}} - @yield('title')</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="{{ asset('css/discord.css') }}" rel="stylesheet">
    <link href="{{ asset('css/goldfish.css') }}" rel="stylesheet">
    <script src="{{ asset('js/app.js') }}" defer></script>
  </head>
  <body>
  <div id="page-wrap">
    <div class="header">
      <div class="container relative">
        <a href="#" class="logo"><img src="{{CMSHelper::settings('site_logo')}}"/></a>
        <div class="online">{{CMSHelper::online()}} Online Now</div>
        <div class="right">
            <ul class="header_options">
              <li class="settings" onclick="window.location.href='/settings'"></li>
              <li class="logout" onclick="window.location.href='/logout'"></li>

            </ul>
          <div class="userinfo no-mobile">
            <div class="purse">
              <p class="credits currency">{{ Auth()->User()->credits }}</p>
              <p class="duckets currency">{{ (!empty(Auth()->User()->duckets->amount) ? Auth()->User()->duckets->amount : '0') }}</p>
              <p class="diamonds currency">{{ (!empty(Auth()->User()->diamonds->amount) ? Auth()->User()->diamonds->amount : '0') }}</p>
            </div>
            <div class="cut_avatar"><img src="{{CMSHelper::settings('habbo_imager')}}{{ Auth::user()->look }}&action=wav&direction=3&head_direction=3"></div>
        </div>
        </div>
      </div>
    </div>
  @include('partials.navbar')
    <main class="py-4">
        @yield('content')
    </main>
  </div>
  @include('partials.footer')
</body>
</html>
