@extends('layout.master')
@section('content')
@section('step', '1')
<div class="col-lg-9">
  @if(!empty(env('DB_DATABASE')))
  <div class="box grey text-center">
    <p>Welcome to GoldFish! To begin, please press continue, please note, this will not remove any existing hotel data, this will only insert new database tables relating to GoldFish. If you need some help or are confused, you can join the <a href="https://discordapp.com/invite/eVAYDUp">Discord Server</a></p>
    <p>Remember, all information you input, can be changed later through the database or through your hotel housekeeping.</p>
  </div>
  <span class="controls">
    <form method="post">
      <button class="green right" type="submit">Continue</button>
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
