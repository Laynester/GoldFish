@extends('layouts.base')
@section('content')
@section('title', 'Community')
<div class="container">
  <div class="row">
    <div class="col-lg-12">
      <div class="grid-3">
          @include('components.news')
        </div>
    </div>
      <div class="col-lg-3">
        @include('components.twitter')
      </div>
      <div class="col-lg-3">
        @include('components.discord')
      </div>
      <div class="col-lg-6">
        @include('components.randomhabbos')
      </div>
  </div>
</div>
@endsection
