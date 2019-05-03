<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{CMSHelper::settings('hotelname')}} - @yield('title')</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">
    <link href="{{ asset('css/goldfish.css') }}" rel="stylesheet">
    <script src="{{ asset('js/app.js') }}" defer></script>
  </head>
  <body>
  <div id="page-wrap">
    <div class="header">
      <div class="navbar">
        <div class="container relative">
          <ul class="navbar-nav mr-auto">
            <span>{{CMSHelper::online()}} Online Now</span>
          </ul>
          <ul class="right">
            <li class="nav-item diamonds">
              {{ (!empty(Auth()->User()->diamonds->amount) ? Auth()->User()->diamonds->amount : '0') }} Diamonds
            </li>
            <li class="nav-item credits">
              {{ Auth()->User()->credits }} Credits
            </li>
          </ul>
        </div>
      </div>
      <div class="container relative">
        <a href="#" class="logo"></a>
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
