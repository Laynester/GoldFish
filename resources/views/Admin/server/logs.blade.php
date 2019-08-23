@extends('layouts.hk')
@section('content')
@section('title', 'Logging')
<div class="row">
  <div class="col-md-4">
    @include('modules.navigation')
  </div>
  <div class="col-md-8">
      @if($type == 'hk')
      @include('modules.server.hk_logs')
      @elseif($type == 'commands')
      @include('modules.server.emu_logs')
      @endif
  </div>
</div>
@endsection
@section('javascript')
@endsection
