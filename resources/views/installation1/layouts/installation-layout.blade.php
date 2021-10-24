<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{env('APP_NAME')}} - Step @yield('step')</title>

    {{-- CSS --}}
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="{{ asset('install/install.css') }}" rel="stylesheet">
    <link href="//code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" rel="stylesheet">

    {{-- Javascript --}}
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script
        src="https://code.jquery.com/jquery-3.4.0.min.js"
        integrity="sha256-BJeo0qm959uMBGb65z40ejJYGSgR7REI4+CW1fNKwOg="
        crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
</head>

<body>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-9">
            <div class="processor">
                <div class="row header">
                    <div class="col-lg-4">
                        <img class="logo" src="/images/goldfish.png">
                    </div>

                    <div class="col-lg-4"></div>

                    <div class="col-lg-4">
                        <span class="bottom right"><b>@yield('step')/6</b> of Steps</span>
                    </div>
                </div>

                <div class="justify-content-center py-4">
                    <div class="row px-4 text-center mb-2">
                        @if($errors->any())
                            <div class="box red w-100 py-2">
                                @foreach($errors->all() as $error)
                                    {{ $error }}
                                @endforeach
                            </div>
                        @endif
                    </div>

                    @yield('content')
                </div>

                <x-footer/>
            </div>
        </div>
    </div>
</div>
</body>
</html>
