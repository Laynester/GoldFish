@extends('layouts.hk')
@section('content')
@section('title', 'Credits')
<div class="body_content">
    <div class="row justify-content-center text-center">
        <div class="col-md-10">
            <img src="/images/goldfish.png">
            <p>
                Goldfish has been in development since May 4th, 2019<br>
                Goldfish is a free software, developed for Arcturus Morningstar, found on <a href="https://arcturus.dev/">Arcturus.Dev</a>,<br> So if you paid for this, get your money back!
            </p>
            <p>
                <h3>@yield('title')</h3>
                <strong>Laynester</strong> - Main development <br>
                <strong>Object</strong> - Further updates <br>
                <strong>Harmony</strong> - Taught Laynester basic Laravel <br>
                <strong>Leenster</strong> - Taught Laynester PHP/HTML/CSS/JS <br>
                <strong>Beny</strong> - Loading screen design <br>
                <strong>Higoka</strong> - RCON Wrapper <br>
                <strong>Shxy</strong> - GoldFish design requests <br>
                <strong>Billsonnnnn</strong> - Flash event JS <br>
                <strong>Jerry</strong> - Laravel Findretros middleware <br>
                <strong>Meth0d</strong> - Housekeeping inspiration <br>
                <strong>HarmonicRain</strong> - Krews(Morningstar) <br>
                <strong>TheGeneral</strong> - Arcturus Emulator <br>
                <strong>Ridge</strong> - Emotional Support <br>
                <strong>Craig</strong> - Emotional Support <br>
                <strong>Hollywood (Pulse)</strong> - Support Team <br>
                <strong>Anth</strong> - Support Team <br>
                <strong>Quackster</strong> - Providing HoloCMS Archive <br>
                <strong>MiguelGonzalez</strong> - Providing HoloCMS GitHub repo <br>
                <strong>DevBest</strong> - Feedback <br>
                <strong>Habborator</strong> - Image Archive <br>
                <strong>FaCuZ</strong> - Laravel Theme package <br>
            </p>
            <p>
                <h3>Laravel</h3>
                <span>If you'd like to edit your copy of <strong>GoldFish</strong>, check out Laravel Docs</span><br>
                <a href="https://laravel.com/docs/8.x">Laravel documentation</a><br>
            </p>
        </div>
    </div>
</div>
@endsection
