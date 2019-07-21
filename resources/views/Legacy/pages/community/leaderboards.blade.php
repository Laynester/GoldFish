@extends('layouts.master')
@section('title', 'Leaderboard')
@section('content')
<div class="row">
  <div class="col-lg-4">
    @include('components.leaderboards.credits')
  </div>
  <div class="col-lg-4">
    @include('components.leaderboards.diamonds')
  </div>
  <div class="col-lg-4">
    @include('components.leaderboards.duckets')
  </div>
</div>
@endsection
