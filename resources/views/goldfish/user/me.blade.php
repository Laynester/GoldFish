@extends('layouts.base')

@section('title', auth()->user()->username)

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-5">
            <x-goldfish.user.me-box :alerts="$alerts"/> {{-- TODO: Potentially remove --}}
            <x-goldfish.find-user/>
            <x-goldfish.user.personal-badges :badges="$badges"/>
            <x-goldfish.user.personal-friends :online-friends="$onlineFriends"/>
        </div>

        <div class="col-lg-7">
            <x-goldfish.news-slider :news="$news"/>

            <div class="row">
                <div class="col-lg-6">
                    <x-goldfish.twitter-box/>
                </div>

                <div class="col-lg-6">
                    <x-goldfish.discord-box/>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
