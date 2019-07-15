@extends('layout.master')
@section('content')
@section('step', '1')
<div class="col-lg-9">
  @if(!empty(env('DB_DATABASE')))
  <div class="box grey text-center">
    <p>Hello and welcome to <b>GoldFish</b>, To begin, press continue! Please note, If you incorectly install GoldFish, you can get help by joining the <a href="https://discordapp.com/invite/eVAYDUp">Discord Server</a></p>
    <p>WARNING: Clicking continue will insert information into your database, So if you have not already, please fill out the information in the .env in your root folder.<small>(No hotel data will be lost!)</small></p>
  </div>
  <span class="controls">
    <form method="post">
      <button class="green" type="submit">Continue</button>
      @csrf
    </form>
  </span>
  @else
  <div class="box red text-center">
    <p>Hey! You haven't set up your .env file! You must fill out your database information before continuing!</p>
  </div>
  @endif
</div>
@endsection
