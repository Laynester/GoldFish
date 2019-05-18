@extends('layouts.hk')
@section('content')
@section('title', 'Lookup User')
<div class="row">
  <div class="col-md-4">
    @include('modules.navigation')
  </div>
  <div class="col-md-8">
    @include('modules.lookup.user')
  </div>
</div>
@endsection
@section('javascript')
@endsection
