@extends('layouts.hk')
@section('content')
@section('title', 'Dashboard')
<div class="body_content">
  <h3>@yield('title')</h3>
  <div id="update_notification" style="display:none;overflow:auto;" class="alert alert-info">
  </div>   
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
    <div class="box_1">
      <div class="heading">Communications</div>
      <div class="row">
        <div class="col-md-6">
          <div class="box_2">
            <div class="heading">Housekeeping Notes</div>
            <div class="content center">
              <form method="post">
                <textarea name="notes" rows="8">{{CMSHelper::settings('hk_notes')}}</textarea>
                @if (auth()->user()->rank >= CMSHelper::fuseRights('moderation_user_admin'))
                <button type="submit">Save</button>
                @endif
                @csrf
              </form>
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="box_2">
            <div class="heading">Staff Info</div>
            <table class="full">
            @foreach(App\Models\User\User::where('rank', '>=','3')->orderBy('id','ASC')->get() as $habbo)
            <tr>
              <td class="text-center"><a href="/home/{{$habbo->username}}">{{$habbo->username}}</a> (ID:{{$habbo->id}})</td>
              <td class="text-center">{{$habbo->ip_current}}</td>
            </tr>
            @endforeach
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
    <div class="box_1">
      <div class="heading">Support GoldFish</div>
      <div class="content">
        <p class="small"> GoldFish is, and always will be, free software. To help keep the developer happy and allow him to buy a coffee <i>every now and then</i>, you can make a donation. This is completely optional, and if you decide not to donate, you won't miss out on any advantages, besides the developer's gratitude. All donations are processed by PayPal.</p>
        <form class="text-center" action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
          <input type="hidden" name="cmd" value="_donations" />
          <input type="hidden" name="business" value="28XMV2LTAUWKY" />
          <input type="hidden" name="currency_code" value="CAD" />
          <input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_donate_LG.gif" border="0" name="submit" title="PayPal - The safer, easier way to pay online!" alt="Donate with PayPal button" />
          <img alt="" border="0" src="https://www.paypal.com/en_CA/i/scr/pixel.gif" width="1" height="1" />
        </form>
      </div>
    </div>
  </div>
</div>
</div>
<script>
  $(document).ready(function() {
    $.ajax({
      type: 'GET',
      url: 'update/check',
      async: false,
      dataType: 'json',
      success: function(response) {
        if (response != '') {
          $('#update_notification').append('<button type="button" style="margin-left: 20px" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>');
          if (response.message != null) {
            $('#update_notification').removeClass('alert-info')
            $('#update_notification').addClass('alert-danger');
            $('#update_notification').append(response.message);
          } else {
            $('#update_notification').append('<button type="button" style="margin-left: 20px" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>');
            $('#update_notification').append('<strong>Update Available <span class="badge badge-pill badge-info">v' + response.version + '</span></strong><a role="button"  class="btn btn-sm btn-info pull-right right" onclick="update()">Update Now</a>');
          }
          $('#update_notification').show();
        }
      }
    });
  });

  function update() {
    $.ajax({
      type: 'GET',
      url: 'update/update',
      async: false,
      dataType: 'json',
      success: function(response) {
        if (response != '') {
          $('#update_notification').html('');
          $('#update_notification').removeClass('alert-info')
          if (response.error != null) {
            $('#update_notification').addClass('alert-danger');
            $('#update_notification').append('<button type="button" style="margin-left: 20px" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>');
            $('#update_notification').append(response.message);
            $('#update_notification').append('</br><a style="color:#fff;" href="' + response.releaseLink + '">' + response.releaseLink + '</a>');
            if (response.link != null) {
              $('#update_notification').append('</br>Sql updates are needed aswell:');
              $('#update_notification').append('</br><a style="color:#fff;" href="' + response.link + '">' + response.link + '</a>');
            }
          } else {
            $('#update_notification').addClass('alert-success')
            $('#update_notification').append('<button type="button" style="margin-left: 20px" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>');
            $('#update_notification').append(response.message);
            if (response.link != null) {
              $('#update_notification').append('</br>Sql updates are needed:');
              $('#update_notification').append('</br><a href="' + response.link + '">' + response.link + '</a>');
            }
            $('#update_notification').show();
          }
        }
      }
    });
  }
</script>
@endsection
