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
                  <td>{{HKHelper::getCount('App\Models\Hotel\Items')}}</td>
                </tr>
              </table>
          </div>
        </div>
        <div class="col-md-6">
          <div class="box_2">
            <div class="heading">Server Setup</div>
            <div class="content">
              <table>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
@endsection
