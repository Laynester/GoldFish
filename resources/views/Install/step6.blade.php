@extends('layout.master')
@section('content')
@section('step', '6')
<div class="col-lg-12">
  <div class="box green">
    <p>You made it! GoldFish installed successfully! You can now proceed to your new <a href="/installer/step/6?success">site</a></p>
    <p>Remember you can change these settings through the database, or your hotel housekeeping.</p>
  </div>
  <span class="controls">
    <form method="post">
      <button class="red" type="submit">Start Over</button>
      @csrf
    </form>
  </span>
</div>
@endsection
