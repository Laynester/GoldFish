@extends('layouts.base')
@section('content')
@section('title', 'Me')
<div class="container">
  <div class="row">
    <div class="col-lg-5">
      @include('components.me')
      @include('components.personalbadges')
    </div>
    <div class="col-lg-7">
      <div class="grid-200">
          @include('components.news')
        </div>
        <div class="row">
        <div class="col-lg-6">
          @include('components.twitter')
        </div>
        <div class="col-lg-6">
          @include('components.discord')
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
