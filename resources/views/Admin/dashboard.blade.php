@extends('layouts.hk')
@section('content')
@section('title', CMSHelper::settings('hotelname').' Hotel Housekeeping')
<div class="body_content">
  <h3>@yield('title')</h3>
<div class="row">
  <div class="col-md-8">
    <div class="box_1">
      <div class="heading">Statistics & Info</div>
      <div class="row">
        <div class="col-md-6">
          <div class="box_2">
            <div class="heading">System Overview</div>
              <table class="full">
                <tr>
                  <td>GoldFish Version:</td>
                  <td>{{config('app.version_number')}}</td>
                </tr>
                <tr>
                  <td>Registered Users:</td>
                  <td>{{HKHelper::getCount('App\Models\User\User')}}</td>
                </tr>
                <tr>
                  <td>Furniture:</td>
                  <td>{{HKHelper::getCount('App\Models\Hotel\Item')}}</td>
                </tr>
                <tr>
                  <td>Rooms:</td>
                  <td>{{HKHelper::getCount('App\Models\Hotel\Room')}}</td>
                </tr>
                <tr>
                  <td>Groups:</td>
                  <td>{{HKHelper::getCount('App\Models\Hotel\Group')}}</td>
                </tr>
              </table>
          </div>
        </div>
        <div class="col-md-6">
          <div class="box_2">
            <div class="heading">Server Setup</div>
              <table class="full">
                <tr>
                  <td>Game Port:</td>
                  <td>{{CMSHelper::settings('emuport')}}</td>
                </tr>
                <tr>
                  <td>RCON Port:</td>
                  <td>{{CMSHelper::settings('rconport')}}</td>
                </tr>
                <tr>
                  <td>Camera Enabled:</td>
                  <td>{{HKHelper::emuSettings('camera.enabled')}}</td>
                </tr>
                <tr>
                  <td>Internal Group Badges:</td>
                  <td>{{HKHelper::emuSettings('imager.internal.enabled')}}</td>
                </tr>
                <tr>
                  <td>Default Homeroom:</td>
                  <td>{{HKHelper::emuSettings('hotel.home.room')}}</td>
                </tr>
              </table>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-md-4">
    <div class="box_1">
      <div class="heading">Welcome back, {{Auth()->User()->username}}!</div>
      <div class="content row">
        <div class="col-md-6">
          <img style="margin:auto;display:block;" src="{{CMSHelper::settings('habbo_imager')}}{{ Auth::user()->look }}&action=wav&gesture=sml&direction=4&head_direction=3">
        </div>
        <div class="col-md-6">
          <table class="full small">
            <tr>
              <td>Motto:</td>
              <td>{{ Auth::user()->motto }}</td>
            </tr>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
@endsection
