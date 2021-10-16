@extends('layouts.master')
@section('title', 'Staff')
@section('content')
<div class="row">
  <div class="col-md-12">
    <div class="photo-grid">
      @forelse(App\Models\User\User::where('rank', '>=', 4)->get() as $habbo)
      <div class="legacy-box meview staff">
        <div class="heading">{{$habbo->username}}</div>
        <div class="content">
          <div class="row justify-content-center">
            <div class="col-lg-6">
              <div class="plate">
                <img src="{{CMSHelper::settings('habbo_imager')}}{{ $habbo->look }}">
              </div>
            </div>
            <div class="col-lg-6">
              <span><a href="{{ route('profile.show', [$habbo->username]) }}">{{$habbo->username}}</a></span>
              <span><b>{{$habbo->rank_name->rank_name}}</b></span>
              <span><img src="{{CMSHelper::settings('c_images')}}album1584/{{$habbo->rank_name->badge}}.gif"></span>
            </div>
          </div>
        </div>
      </div>
      @empty
      <p class="text-center">No users</p>
      @endforelse
    </div>
  </div>
</div>
@endsection
