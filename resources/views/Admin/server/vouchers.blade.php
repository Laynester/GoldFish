@extends('layouts.hk')
@section('content')
@section('title', 'Voucher Codes')
<div class="row">
  <div class="col-md-4">
    @include('modules.navigation')
  </div>
  <div class="col-md-8">
    @include('modules.server.vouchers')
  </div>
</div>
@endsection
@section('javascript')
@endsection
