@extends('layouts.base')
@section('content')
@section('title', 'Me')
<div class="container">
  <div class="row">
    <div class="col-lg-5">
      @include('components.me')
      @include('components.search')
      @include('components.personalbadges')
      @include('components.friends')
    </div>
    <div class="col-lg-7">
      @include('components.news')
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
