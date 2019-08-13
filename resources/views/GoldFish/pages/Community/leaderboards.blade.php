@extends('layouts.base')
@section('content')
@section('title', 'Leaderboards')
<div class="container">
  <div class="row">
    <div class="col-lg-4">
      @include('components.leaderboards.credits')
      @include('components.leaderboards.respects_gained')
    </div>
    <div class="col-lg-4">
      @include('components.leaderboards.diamonds')
      @include('components.leaderboards.achievement')
    </div>
    <div class="col-lg-4">
      @include('components.leaderboards.duckets')
      @include('components.leaderboards.timeonline')
    </div>
  </div>
</div>
@endsection
