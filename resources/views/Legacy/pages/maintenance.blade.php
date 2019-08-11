@extends('layouts.processor')
@section('title', 'Maintenance')
@section('content')
<div class="row">
  <div class="col-md-12">
    <div class="alert alert-danger" role="alert">
      <h2>The Hotel is in maintenance.</h2>
      <a href="/maintenance/login">Staff? Login here</a>
    </div>
  </div>
</div>
@endsection
