<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{CMSHelper::settings('hotelname')}} - @yield('title')</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="{{ asset('goldfish/css/goldfish.css') }}?v={{CMSHelper::settings('cacheVar')}}" rel="stylesheet">
    <link href="{{ asset('admin/css/housekeeping.css') }}?v={{CMSHelper::settings('cacheVar')}}" rel="stylesheet">
    <script src="{{ asset('js/app.js') }}?v={{CMSHelper::settings('cacheVar')}}" defer></script>
    <script
  src="https://code.jquery.com/jquery-3.4.0.min.js"
  integrity="sha256-BJeo0qm959uMBGb65z40ejJYGSgR7REI4+CW1fNKwOg="
  crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>
  </head>
  <body>
    <div class="container">
      <div class="hk_navigation">
        <ul>
          <li id="dashboard" @if($group == 'dashboard') class="active" @endif><a href="{{ route('dashboard') }}">Dashboard</a></li>
          @if(CMSHelper::fuseRights('server'))
          <li id="server" @if($group == 'server') class="active" @endif><a href="{{ route('hk.server-client')}}">Server</a></li>
          @endif
          @if(CMSHelper::fuseRights('site'))
          <li id="site" @if($group == 'site') class="active" @endif><a href="{{ route('hk.newslist') }}">Site & Content</a></li>
          @endif
          @if(CMSHelper::fuseRights('moderation'))
          <li id="user" @if($group == 'user') class="active" @endif><a href="{{ route('hk.chat-list') }}">Users & Moderation</a></li>
          @endif
          <li id="credits" @if($group == 'credits') class="active" @endif><a href="{{ route('credits') }}">GoldFishCMS</a></li>
          <li id="back"><a href="{{ route('me.index') }}">Back to Site</a></li>
        </ul>
      </div>
      <div class="hk_welcome">
        <span>{{CMSHelper::settings('hotelname')}} Hotel Housekeeping</span>
        <span class="right">Welcome {{Auth()->User()->username}} ({{Auth()->User()->id}})</span>
      </div>
      <div class="hk_body">
            @yield('content')
      </div>
      <footer class="text-center">
        <span>Made by <a href="http://layne.cf">Laynester</a></span>
        <span>GoldFishCMS v{{config('app.version_number')}}</span>
        <span>Need help? Join the discord server <a href="https://discordapp.com/invite/eVAYDUp">here</a></span>
      </footer>
    </div>
    @yield('javascript')
  </body>
</html>
