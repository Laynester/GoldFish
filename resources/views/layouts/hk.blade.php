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
    <link href="{{ asset('css/housekeeping.css') }}" rel="stylesheet">
    <script src="{{ asset('js/app.js') }}" defer></script>
  </head>
  <body>
    <div class="container">
      <div class="hk_navigation">
        <ul>
          <li @if($group == 'dashboard') class="active" @endif><a href="">Dashboard</a></li>
          <li @if($group == 'server') class="active" @endif><a href="">Server</a></li>
          <li @if($group == 'site') class="active" @endif><a href="">Site & Content</a></li>
          <li><a href="">Users & Moderation</a></li>
        </ul>
      </div>
      <div class="hk_welcome">
        <span>{{CMSHelper::settings('hotelname')}} Hotel Housekeeping</span>
        <span class="right">Welcome {{Auth()->User()->username}} ({{Auth()->User()->id}})</span>
      </div>
      <div class="hk_body">
        <h3>@yield('title')</h3>
          @yield('content')
      </div>
    </div>
  </body>
</html>
