@extends('layouts.master')
@section('title', 'Account Settings')
@section('content')
<div class="row">
  <div class="col-md-4">
    @include('components.settings.navigation')
  </div>
  <div class="col-md-8">
    @include('components.settings.account')
  </div>
</div>
@endsection
