@extends('layout.master')
@section('content')
@section('step', '1')
<div class="col-lg-9">
  <div class="box grey">
    <p>Hello and welcome to <b>GoldFish</b>, To begin, press continue! Please note, If you incorectly install GoldFish, you can get help from the discord server: <a href="https://discordapp.com/invite/eVAYDUp">Here</a></p>
    <p>WARNING: Clicking continue will insert information into your database, So if you have not already, please fill out the information in the .env in your root folder.<small>(No hotel data will be lost!)</small></p>
  </div>
  <span class="controls">
    <form method="post">
      <button class="green" type="submit">Continue</button>
      @csrf
    </form>
  </span>
</div>
@endsection
