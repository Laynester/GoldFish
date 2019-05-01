@extends('layouts.base')
@section('content')
@section('title', 'Me')
<div class="container">
  <div class="row">
    <div class="col-lg-5">
      <div class="box meview" style="background-image:url(/images/me/views/{{CMSHelper::settings('mepage_view')}});">
        <div class="plate">
          <img src="https://habbo.com.br/habbo-imaging/avatarimage?figure={{ Auth::user()->look }}">
        </div>
        <a class="enter_hotel" href="{{ route('client') }}" target="_blank">
          Enter {{CMSHelper::settings('hotelname')}}
        </a>
        <div class="habbo-info">
          <div class="motto"><strong>{{ Auth::user()->username }}:</strong> {{ Auth::user()->motto }}</div>
        </div>
        <div class="feed-items">
          @if(CMSHelper::settings('site_alert_enabled') =='1')
          <div class="alert item">
            <img src="{{CMSHelper::settings('c_images')}}album1584/{{CMSHelper::settings('site_alert_badge')}}.gif"/>
            <span>{{CMSHelper::settings('site_alert')}}<span>
          </div>
          @endif
          <div class="item login">
            Last Logged in: {{date('F d, Y', Auth::user()->last_login)}}
          </div>
        </div>
      </div>
      <div class="box badges">
        <div class="heading">My Badges</div>
        <div class="content">
          @foreach($badges as $badge)
            <span class="habbo_badge"><img src="{{CMSHelper::settings('c_images')}}album1584/{{$badge->badge_code}}.gif"></span>
          @endforeach
        </div>
    </div>
    </div>
    <div class="col-lg-7">
      <div class="grid-3">
          @include('components.news')
        </div>
        <div class="row">
        <div class="col-lg-6">
        </div>
        <div class="col-lg-6">
          @include('partials.discord')
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
