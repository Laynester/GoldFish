@extends('layouts.base')

@section('title', 'Community')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-7">
                <x-goldfish.community.random-users :randomUsers="$randomUsers"/>
                <x-goldfish.news-slider :news="$news"/>
            </div>

            <div class="col-lg-4">
                <x-goldfish.discord-box/>
                <x-goldfish.twitter-box/>
            </div>
        </div>
    </div>
@endsection
