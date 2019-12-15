@extends('layouts.base')
@section('content')
@section('title', 'Community')
<div class="container">
  <div class="row">
    <div class="col-lg-8">
      @include('components.community.randomhabbos')
      @include('components.news')
    </div>
    <div class="col-lg-4">
      @include('components.discord')
      @include('components.twitter')
    </div>
  </div>
</div>
@endsection
