@extends('layouts.base')
@section('content')
@section('title', 'News')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-lg-8">
      @include('components.community.article')
    </div>
    <div class="col-lg-4">
      @include('components.twitter')
      @include('components.discord')
    </div>
  </div>
</div>
@endsection
