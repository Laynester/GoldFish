@extends('layouts.hk')
@section('content')
@section('title', 'General Settings')
<div class="row">
  <div class="col-md-4">
    @include('modules.navigation')
  </div>
  <div class="col-md-8">
    @include('modules.site.settings1')
  </div>
</div>
@endsection
@section('javascript')
@endsection
