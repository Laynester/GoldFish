@extends('layouts.master')

@section('title', auth()->user()->username)

@section('content')
    <div class="row">
        <div class="col-md-5">
            <x-legacy.me.my-habbo :alerts="$alerts"/>
            <x-legacy.me.search-box />
            <x-legacy.me.online-friends :onlineFriends="$onlineFriends"/>
            <x-legacy.me.user-badges :badges="$badges"/>
        </div>

        <div class="col-md-7">
            <x-legacy.articles-box :news="$news" :otherArticles="$otherArticles"/>

            <div class="row inside">
                <div class="col-lg-6">
                    <x-legacy.discord-widget/>
                </div>

                <div class="col-lg-6">
                    <x-legacy.twitter-widget/>
                </div>
            </div>
        </div>
    </div>
@endsection
