@extends('layouts.hk')
@section('content')
@section('title', 'Online Users')
<div class="row">
  <div class="col-md-4">
    @include('modules.navigation')
  </div>
  <div class="col-md-8">
    @include('modules.moderation.online')
  </div>
</div>
@endsection
@section('javascript')
@endsection
