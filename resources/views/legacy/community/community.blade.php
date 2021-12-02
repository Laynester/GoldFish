@extends('layouts.master')
@section('title', 'Community')
@section('content')
    <div class="row">
        <div class="col-md-5">
            <x-legacy.twitter-widget/>
            <x-legacy.discord-widget/>
        </div>
        <div class="col-md-7">
            <x-legacy.articles-box :news="$news" :otherArticles="$otherArticles" />
            <x-legacy.community.random-online-users :randomOnlineUsers="$randomOnlineUsers"/>
            <x-legacy.community.random-users :randomUsers="$randomUsers"/>
        </div>
    </div>
@endsection
