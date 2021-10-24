@extends('layouts.processor')
@section('title', 'Login')
@section('content')
<div class="col-md-4">
  <div class="legacy-box blue">
    <div class="heading">Sign in</div>
    <div class="content">
      <form method="POST" id="loginForm"{{(CMSHelper::settings('maintenance') == 0 ? 'action='.route('login.index') : '')}}>
        @csrf
        <div class="form-group">
          <input id="username" placeholder="Username" type="text" name="username" value="{{ old('username') }}" required autocomplete="username" autofocus>
        </div>
        <div class="form-group">
          <input id="password" placeholder="Password" type="password" name="password" required autocomplete="current-password">
        </div>
        <div class="form-group">
          <button class="black login" type="submit">Login</button>
        </div>
      </form>
      <button onclick="window.location.href='/register'" class="green register">New here? Join now!</button>
    </div>
  </div>
</div>
@endsection
