<div class="userfirst">
    <div class="usernamebox">
      <div class="username">
        {{$user->username}}
      </div>
    </div>
    <div class="usermottobox">
      <span>{{CMSHelper::settings('hotelname')}} created on:</span>
      <b>{{date('d-M-Y',$user->account_created)}}</b>
    </div>
  </div>
  <div class="userplate">
    <div class="useravatar"><img src="{{CMSHelper::settings('habbo_imager')}}{{ $user->look }}&direction=4&head_direction=4"></div>
  </div>
  <div class="usermotto">
    {{$user->motto}}
  </div>