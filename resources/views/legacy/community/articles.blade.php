@extends('layouts.master')
@section('title', 'Articles')
@section('content')
    <div class="row">
        <div class="col-md-7">
           <x-legacy.community.articles-list :news="$news"/>
        </div>
        <div class="col-md-5">
            <x-legacy.discord-widget/>
            <x-legacy.twitter-widget/>
        </div>
    </div>
@endsection
