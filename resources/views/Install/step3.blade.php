@extends('layout.master')
@section('content')
@section('step', '3')
<div class="col-lg-6">
  <div class="box grey">
    <p>Please fill in information about the database GoldFish will connect to, please note any existing website data will be lost (no hotel data will be touched)</p>
    <p>WARNING: You must have an existing arcturus database already.</p>
  </div>
</div>
<div class="col-lg-6">
  @if($errors->any())
  <div class="box red">
    {{$errors->first()}}
  </div>
  @endif
  <form method="post">
    <div class="box">
      <h2>Database</h2>
      <div class="form-group">
        <label>Host:</label>
        <input class="inputs" type="text" name="host" value="localhost">
      </div>
      <div class="form-group">
        <label>Database Port:</label>
        <input class="inputs" type="text" name="port" value="3306">
      </div>
      <div class="form-group">
        <label>Database Username:</label>
        <input class="inputs" type="text" name="username" value="root">
      </div>
      <div class="form-group">
        <label>Database Password:</label>
        <input class="inputs" type="password" name="password" value="">
      </div>
      <div class="form-group">
        <label>Database Name:</label>
        <input class="inputs" type="text" name="dbname" value="">
      </div>
    </div>
    <span class="controls">
      <button type="submit">Save</button>
    </span>
    @csrf
  </form>
</div>
@endsection
