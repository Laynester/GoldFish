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
  <div class="col-md-6 home-col-1">
  </div>
  <div class="col-md-6 home-col-2">
    @include('components.homes.habbo')
    @include('components.homes.badges')
  </div>
</div>
@endsection
