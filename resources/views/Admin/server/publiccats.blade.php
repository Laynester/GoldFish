@extends('layouts.hk')
@section('content')
@section('title', 'Public Categories')
<div class="row">
  <div class="col-md-4">
    @include('modules.navigation')
  </div>
  <div class="col-md-8">
    @include('modules.server.publiccats')
  </div>
</div>
@endsection
@section('javascript')
@endsection
