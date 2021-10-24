@extends('layouts.processor')
@section('title', 'Login')
@section('content')
<div class="legacy-box blue">
  <div class="heading">Register</div>
  <div class="content">
    <form method="POST" action="{{ route('register') }}">
      @csrf
      <div class="form-group">
        <input id="username" placeholder="Username" type="text" name="username" value="{{ old('username') }}" required autocomplete="username" autofocus>
      </div>
      <div class="form-group">
        <input id="password" placeholder="Email-Address" type="text" name="mail" value="{{ old('mail') }}" required autocomplete="email">
      </div>
      <div class="form-group">
        <input id="password" placeholder="Password" type="password" name="password" required autocomplete="current-password">
      </div>
      <div class="form-group">
        <input id="password" placeholder="Confirm password" type="password" name="password_confirmation" required autocomplete="new-password">
      </div>
      <div class="form-group">
        <button class="green register" type="submit">Register</button>
      </div>
    </form>
  </div>
</div>
@endsection
