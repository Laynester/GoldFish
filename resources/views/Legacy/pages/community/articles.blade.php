@extends('layouts.master')
@section('title', 'Articles')
@section('content')
<div class="row">
  <div class="col-md-7">
    @include('components.community.articles')
  </div>
  <div class="col-md-5">
    @include('components.constant.discord')
    @include('components.constant.twitter')
  </div>
</div>
@endsection
