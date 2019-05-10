@extends('layouts.base')
@section('content')
@section('title', 'Photo')
<div class="container">
  <div class="row">
    <div class="col-lg-12">
      <div class="grid-275">
        @foreach ($photos as $photo)
        <figure class="photo">
          <div class="image" style="background-image:url({{$photo->url}})">
            <div class="bottom">
              {{date('d/m/y h:i', $photo->timestamp)}}
            </div>
          </div>
          <div class="user_info">
            <img src="{{CMSHelper::settings('habbo_imager')}}{{ $photo->habbo->look }}&headonly=1">
            {{$photo->habbo->username}}
          </div>
          <p class="end"></p>
        </figure>
        @endforeach
      </div>
    </div>
  </div>
</div>
@endsection
