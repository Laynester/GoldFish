@extends('layouts.base')

@section('title',$user->username)

@section('content')

    <style>
        body {
            background-image: url(/assets/images/profile_backgrounds/{{ $user->profile_background }})
        }
    </style>

    <div class="container">
        <div class="whoIS">
            <div class="avatar">
                <img src="{{CMSHelper::settings('habbo_imager')}}{{ $user->look }}&direction=4&head_direction=4">
            </div>
            <div class="info">
                <h3>{{ $user->username }}</h3>
                <p>{{ $user->motto }}</p>
            </div>
        </div>
        <div class="row profile">
            <div class="col-lg-6">
                <x-goldfish.profile.profile-badges :user="$user" :badges="$badges"/>
                <x-goldfish.profile.profile-rooms :user="$user" :rooms="$rooms"/>
            </div>
            <div class="col-lg-6">
                <x-goldfish.profile.profile-friends :user="$user" :friends="$friends"/>
                <x-goldfish.profile.profile-groups :user="$user" :groups="$groups"/>
            </div>
            <div class="col-lg-12">
                <x-goldfish.profile.profile-photos :photos="$photos"/>
            </div>
        </div>
    </div>
@endsection
