@extends('layouts.master')
@section('title', 'Me')
@section('content')
<body class="profiles">
<style>
  body.profiles .legacy-body {
    background-image: url(/images/profile_backgrounds/{{ $user->profile_background }});
    min-height: 1360px;
  }
</style>
<div class="row homepages">
  <div class="col-md-6">
    @include('components.homes.habbo')
    @include('components.homes.rooms')
    @include('components.homes.groups')
  </div>
  <div class="col-md-6">
    @include('components.homes.badges')
    @include('components.homes.friends')
  </div>
</div>
@endsection
@section('css')
<link href="{{ asset('legacy/css/homes.css') }}" rel="stylesheet">
@endsection
