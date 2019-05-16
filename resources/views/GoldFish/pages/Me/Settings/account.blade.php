@extends('layouts.base')
@section('content')
@section('title', 'Settings')
<div class="container">
  <div class="row">
    <div class="col-lg-4">
      @include('components.settings.navigation')
    </div>
    <div class="col-lg-8">
      <div class="box black">
        <div class="heading">Hotel Settings</div>
          <form method="post">
            <label>Me page Hotel View</label>
            
            <button type="submit" name="submit">Save Settings</button>
            @csrf
          </form>
      </div>
    </div>
  </div>
</div>
@endsection
