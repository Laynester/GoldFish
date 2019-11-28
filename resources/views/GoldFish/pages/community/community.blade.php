@extends('layouts.base')
@section('content')
@section('title', 'Community')
<div class="container">
  <div class="row">
    <div class="col-sm-12">
      <div class="grid-200">
        @include('components.news')
      </div>
    </div>
    <div class="col-lg-6">
        @include('components.community.randomhabbos')
      </div>
    <div class="col-lg-3">
      @include('components.twitter')
    </div>
    <div class="col-lg-3">
      @include('components.discord')
    </div>
  </div>
</div>
@endsection
