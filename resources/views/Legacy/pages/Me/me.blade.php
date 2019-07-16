@extends('layouts.master')
@section('title', 'Me')
@section('content')
<div class="row">
  <div class="col-md-5">
    @include('components.me.myhabbo')
    @include('components.me.friends')
    @include('components.me.badges')
  </div>
  <div class="col-md-7">
    @include('components.constant.news')
    <div class="row inside">
      <div class="col-lg-6">
        @include('components.constant.discord')
      </div>
      <div class="col-lg-6">
        @include('components.constant.twitter')
      </div>
    </div>
  </div>
</div>
@endsection
