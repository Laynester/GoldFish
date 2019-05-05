@extends('layouts.base')
@section('content')
@section('title', 'Staff')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-lg-6">
        @include('components.stafflist')
    </div>
    <div class="col-lg-3">
      @include('components.staffinfo')
    </div>
  </div>
</div>
@endsection
