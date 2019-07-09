@extends('layouts.hk')
@section('content')
@section('title', 'Client Settings')
<div class="row">
  <div class="col-md-4">
    @include('modules.navigation')
  </div>
  <div class="col-md-8">
    @include('modules.server.client')
  </div>
</div>
@endsection
@section('javascript')
@endsection
