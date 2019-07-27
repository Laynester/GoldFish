@extends('layouts.hk')
@section('content')
@section('title', 'Fuse Rights')
<div class="row">
  <div class="col-md-4">
    @include('modules.navigation')
  </div>
  <div class="col-md-8">
    @include('modules.site.rights')
  </div>
</div>
@endsection
@section('javascript')
@endsection
