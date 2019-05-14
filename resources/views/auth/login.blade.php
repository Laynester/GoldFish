@extends('layouts.base')
@section('title', 'Login')
@section('content')
<div class="container">
  <div class="row">
    <div class="col-lg-8">
      <div class="grid-200">
        @include('components.news')
      </div>
    </div>
    <div class="col-lg-4">
      @include('components.discord')
      @include('components.twitter')
    </div>
  </div>
</div>
@endsection
