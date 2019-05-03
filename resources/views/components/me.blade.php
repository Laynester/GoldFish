<div class="box meview" style="background-image:url(/images/me/views/{{CMSHelper::settings('mepage_view')}});">
  <div class="plate">
    <img src="{{CMSHelper::settings('habbo_imager')}}{{ Auth::user()->look }}">
  </div>
  <a class="enter_hotel" href="{{ route('client') }}" target="_blank">
    Enter {{CMSHelper::settings('hotelname')}}
  </a>
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
      Last Logged in: {{date('F d, Y', Auth::user()->last_login)}}
    </div>
  </div>
</div>
