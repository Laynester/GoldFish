@extends('layouts.base')
@section('content')
@section('title',$user->username)
<div class="container">
  <div class="row">
    <div class="col-lg-5">
      @include('components.personalbadges')
    </div>
    <div class="col-lg-7">
    </div>
  </div>
</div>
@endsection
