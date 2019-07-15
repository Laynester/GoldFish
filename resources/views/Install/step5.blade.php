@extends('layout.master')
@section('content')
@section('step', '5')
<div class="col-lg-6">
  <div class="box grey">
    <p>Create a new account</p>
    <p>Here, you can create an admin account, or if you already have an account, you can choose to skip this step.</p>
  </div>
  <a style="display:block;" class="text-center" href="/installer/step/6">Already have an account? Skip this step.</a>
</div>
<div class="col-lg-6">
  @if($errors->any())
  <div class="box red">
    {{$errors->first()}}
  </div>
  @endif
  <form method="post">
    <div class="box">
      <h2>Administrator Account</h2>
      <div class="form-group">
        <label>Username:</label>
        <input class="inputs" type="text" name="username" placeholder="Enter a username">
      </div>
      <div class="form-group">
        <label>Password:</label>
        <input class="inputs" type="password" name="password" placeholder="Password">
      </div>
      <div class="form-group">
        <label>Confirm Password:</label>
        <input class="inputs" type="password" name="password_confirmation" placeholder="Confirm password">
      </div>
      <div class="form-group">
        <label>Email:</label>
        <input class="inputs" type="email" name="mail" placeholder="Enter your email">
      </div>
    </div>
    <span class="controls">
      <button class="green" type="submit">Continue</button>
      <a class="red" href="/installer/step/3">Back</a>
    </span>
    @csrf
  </form>
</div>
@endsection
