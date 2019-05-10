@extends('layouts.base')
@section('content')
@section('title',$user->username)
<div class="container">
  <div class="row">
    <div class="col-lg-6">
      <div class="widget_default_skin home_widget" id="profile">
        <h2 class="default_title">My Profile</h2>
        <div class="widget_default_skin_content">
          <div class="user_info left">
            <b>{{$user->username}}</b>
            <span>{{CMSHelper::settings('hotelname')}} Created on:<br> {{date('F d, Y', $user->account_created)}}</span>
          </div>
          <div class="left">
            <img src="{{CMSHelper::settings('habbo_imager')}}{{ $user->look }}&direction=4&head_direction=4">
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-6">
      @include('components.profiles.badges')
    </div>
  </div>
</div>
@endsection
