@extends('layouts.master')
@section('title', 'Hotel Settings')
@section('content')
<div class="row">
  <div class="col-md-4">
    @include('components.settings.navigation')
  </div>
  <div class="col-md-8">
    @include('components.settings.hotel')
  </div>
</div>
@endsection
