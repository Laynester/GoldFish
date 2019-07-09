@extends('layouts.hk')
@section('content')
@section('title', 'Rcon')
<div class="row">
  <div class="col-md-4">
    @include('modules.navigation')
  </div>
  <div class="col-md-8">
    @include('modules.server.rcon')
  </div>
</div>
@endsection
@section('javascript')
@endsection
