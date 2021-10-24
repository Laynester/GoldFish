@extends('layouts.base')
@section('content')
@section('title',$user->username)
<style>
body {
  background-image: url(/images/profile_backgrounds/{{ $user->profile_background }})
}
</style>
<div class="container">
  <div class="whoIS">
    <div class="avatar">
      <img src="{{CMSHelper::settings('habbo_imager')}}{{ $user->look }}&direction=4&head_direction=4">
    </div>
    <div class="info">
      <h3>{{$user->username}}</h3>
      <p>{{$user->motto}}</p>
    </div>
  </div>
  <div class="row profile">
    <div class="col-lg-6">
      @include('components.profiles.badges')
      @include('components.profiles.rooms')
    </div>
    <div class="col-lg-6">
      @include('components.profiles.friends')
      @include('components.profiles.groups')
    </div>
    <div class="col-lg-12">@include('components.profiles.photos')</div>
  </div>
</div>
@endsection
