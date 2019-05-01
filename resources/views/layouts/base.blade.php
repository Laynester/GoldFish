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
        <ul class="navbar-nav mr-auto">
        <span>{{CMSHelper::online()}} Online Now</span>
        </ul>
        <ul class="navbar-nav ml-auto">
          <li class="nav-item diamonds">
            @empty($currency->where("type", 5)->first()->amount)
            0
            @else
              {{$currency->where("type", 5)->first()->amount}}
            @endempty Diamonds
          </li>
          <li class="nav-item credits">
              {{ Auth()->User()->credits }} Credits
          </li>
        </ul>
      </div>
      <a href="#" class="logo"></a>
    </div>
  <div class="navbar">
    <div class="container">
      <div class="dropdown">
    <button class="dropbtn"><img class="shadowed" src="https://habbo.com.br/habbo-imaging/avatarimage?figure={{ Auth()->User()->look }}&headonly=1">{{ Auth()->User()->username }} <span class="caret"></span></button>
    <div class="dropdown-content">
      <a class="dropdown-item" href="{{ route('logout') }}"
         onclick="event.preventDefault();
                       document.getElementById('logout-form').submit();">
          {{ __('Logout') }}
      </a>
      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
          @csrf
      </form>
    </div>
  </div>
  </div>
</div>
    <main class="py-4">
        @yield('content')
    </main>
    @include('partials.footer')
  </div>
</body>
</html>
