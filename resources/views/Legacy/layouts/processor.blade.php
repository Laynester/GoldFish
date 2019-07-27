<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{CMSHelper::settings('hotelname')}} - @yield('title')</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="{{ asset('legacy/css/legacy.css') }}?v={{CMSHelper::settings('cacheVar')}}" rel="stylesheet">
    <link href="{{ asset('legacy/css/legacy_overwrite.css') }}?v={{CMSHelper::settings('cacheVar')}}" rel="stylesheet">
    <link href="//code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" rel="stylesheet">
    <script src="{{ asset('js/app.js') }}?v={{CMSHelper::settings('cacheVar')}}" defer></script>
    <script
  src="https://code.jquery.com/jquery-3.4.0.min.js"
  integrity="sha256-BJeo0qm959uMBGb65z40ejJYGSgR7REI4+CW1fNKwOg="
  crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  </head>
  <body>
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-10">
          @if($errors->any())
          <div class="notification danger" role="alert">
            {{$errors->first()}}
          </div>
          @endif
          <div class="processor-body">
            <div class="top">
              <a href="#"><img src="{{CMSHelper::settings('site_logo')}}"/></a>
            </div>
            <div class="row justify-content-center" id="processor">
              <div class="col-md-4">
                @yield('content')
              </div>
            </div>
            @include('components.footer')
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
