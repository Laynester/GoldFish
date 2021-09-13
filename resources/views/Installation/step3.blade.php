@extends('Installation.layouts.installation')

@section('step', '3')

@section('content')
<div class="col-lg-6">
  <div class="box grey">
    <p>Fill in your hotels social platform information, this will display tweets from your account, and display a discord widget with your hotel server.</p>
  </div>
</div>
<div class="col-lg-6">
  @if($errors->any())
  <div class="box red">
    {{$errors->first()}}
  </div>
  @endif
  <form method="post" action="{{ route('installation.step.update', 3) }}">
      @csrf
    <div class="box">
      <h2>Social Configuration</h2>
      <div class="form-group">
        <label for="title">Discord Widget ID:</label>
        <input class="inputs"type="text" value="{{CMSHelper::settings('discord_id')}}" name="discord_id"/>
      </div>
      <div class="form-group">
        <label for="title">Twitter Handle:</label>
        <input class="inputs"type="text" value="{{CMSHelper::settings('twitter_handle')}}" name="twitter_handle"/>
      </div>
    </div>
    <span class="controls">
      <button class="green" type="submit">Continue</button>
      <a class="red" href="{{ route('installation.step', 2) }}">Back</a>
    </span>
    @csrf
  </form>
</div>
@endsection
