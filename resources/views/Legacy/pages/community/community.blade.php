@extends('layouts.master')
@section('title', 'Community')
@section('content')
<div class="row">
  <div class="col-md-5">
    @include('components.constant.twitter')
    @include('components.constant.discord')
  </div>
  <div class="col-md-7">
    @include('components.constant.news')
    @include('components.community.randomonlinehabbos')
    @include('components.community.randomhabbos')
  </div>
</div>
@endsection
