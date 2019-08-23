<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{CMSHelper::settings('hotelname')}} - @yield('title')</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="{{ asset('goldfish/css/discord.css') }}?v={{CMSHelper::settings('cacheVar')}}" rel="stylesheet">
    <link href="{{ asset('goldfish/css/goldfish.css') }}?v={{CMSHelper::settings('cacheVar')}}" rel="stylesheet">
    <link href="{{ asset('goldfish/css/goldfish_overwrite.css') }}?v={{CMSHelper::settings('cacheVar')}}" rel="stylesheet">
    <link href="//code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" rel="stylesheet">
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
      @if (!Auth::user())
      <body class="guest">
      <div class="login-section">
        <div class="container">
          <div class="login-inputs">
            <form method="POST" id="loginForm">
              @csrf
              <div class="login-input">
              <input id="username" type="text" class="form-control input @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="username" autofocus>
            </div>
            <div class="login-input">
              <input id="password" type="password" class="form-control input @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
            </div>
              <button type="submit" id="login" class="btn btn-primary">
                  {{ __('Login') }}
              </button>
            </form>
          </div>
        </div>
      </div>
      @endif
      <div class="container relative">
        <div class="logo">
          <a href="/me" class="left"><img src="{{CMSHelper::settings('site_logo')}}"/></a>
          <div class="online no-mobile"><span id="onlinecount">{{CMSHelper::online()}}</span> Online Now</div>
        </div>
        <div class="right @guest regbutton @endguest">
          @if (Auth::user())
            <ul class="header_options">
              <li class="settings left" onclick="window.location.href='/settings'"></li>
              <li class="logout left" onclick="window.location.href='/logout'"></li>
            </ul>
          <div class="userinfo no-mobile">
            <div class="purse">
              <p class="credits currency">{{ Auth()->User()->credits }}</p>
              <p class="duckets currency">{{ (!empty(Auth()->User()->duckets->amount) ? Auth()->User()->duckets->amount : '0') }}</p>
              <p class="diamonds currency">{{ (!empty(Auth()->User()->diamonds->amount) ? Auth()->User()->diamonds->amount : '0') }}</p>
            </div>
            <div class="cut_avatar"><img src="{{CMSHelper::settings('habbo_imager')}}{{ Auth::user()->look }}&action=wav&direction=3&head_direction=3"></div>
        </div>
        @else
        <a class="register_button" href="{{ route('register') }}">Join now!</a>
        @endif
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
