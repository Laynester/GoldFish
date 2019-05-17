@extends('layouts.hk')
@section('content')
@section('title', 'Chatlog')
<div class="row">
  <div class="col-md-4">
    @include('modules.navigation')
  </div>
  <div class="col-md-8">
    @include('modules.moderation/chatlog_list')
  </div>
</div>
@endsection
@section('javascript')
@endsection
