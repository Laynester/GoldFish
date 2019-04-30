@extends('layouts.base')
@section('content')
@section('title', 'Me')
<div class="container">
  <div class="row">
    <div class="col-lg-5">
      <div class="box meview">
        <div class="plate">
          <img src="https://habbo.com.br/habbo-imaging/avatarimage?figure={{ Auth::user()->look }}">
        </div>
        <div class="habbo-info">
          <div class="motto"><strong>{{ Auth::user()->username }}:</strong> {{ Auth::user()->motto }}</div>
        </div>
      </div>
    </div>
    <div class="col-lg-7">
          @include('components.news')
    </div>
  </div>
</div>
@endsection
