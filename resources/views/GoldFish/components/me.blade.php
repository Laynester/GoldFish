<div class="box meview" style="background-image:url(/goldfish/images/me/views/{{Auth()->User()->hotelview}});">
  <div class="plate">
    <img src="{{CMSHelper::settings('habbo_imager')}}{{ Auth::user()->look }}">
  </div>
  @if(CMSHelper::hotelstatus() == '1')
  <a class="enter_hotel offline" href="#" target="_blank">
    Hotel is offline
  </a>
  @else
  <a class="enter_hotel" href="{{ route('client') }}" target="_blank">
    Enter {{CMSHelper::settings('hotelname')}}
  </a>
  @endif
  <div class="habbo-info">
    <div class="motto"><strong>{{ Auth::user()->username }}:</strong> {{ Auth::user()->motto }}</div>
  </div>
  <div class="feed-items">
    @if(CMSHelper::settings('site_alert_enabled') =='1')
    <div class="alert item">
      <img src="{{CMSHelper::settings('c_images')}}album1584/{{CMSHelper::settings('site_alert_badge')}}.gif"/>
      <span>{{CMSHelper::settings('site_alert')}}<span>
    </div>
    @endif
    <div class="item login">
      Last Logged in: {{date('F d, Y h:ia', Auth::user()->last_login)}}
    </div>
  </div>
</div>
