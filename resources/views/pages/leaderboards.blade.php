@extends('layouts.base')
@section('content')
@section('title', 'Me')
<div class="container">
  <div class="row">
    <div class="col-lg-4">
      @include('components.leaderboards.credits')
    </div>
    <div class="col-lg-4">
      @include('components.leaderboards.diamonds')
    </div>
    <div class="col-lg-4">
    </div>
  </div>
</div>
@endsection
