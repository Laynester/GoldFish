@extends('layouts.hk')
@section('content')
@section('title', 'Site Alert')
<div class="row">
  <div class="col-md-4">
    @include('modules.navigation')
  </div>
  <div class="col-md-8">
    @include('modules.site.alert')
  </div>
</div>
@endsection
@section('javascript')
@endsection
