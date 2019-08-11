<div class="box meview" style="background-image:url(/goldfish/images/me/views/{{Auth()->User()->hotelview}});">
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
    @foreach(App\Models\CMS\Alerts::orderBy('id','DESC')->get() as $row)
    <div class="alert item">
      <img src="{{CMSHelper::settings('c_images')}}album1584/{{$row->icon}}.gif"/>
      <span>{{$row->message}}</span>
        @if($row->userid == Auth::user()->id)
        <a class="close" href="me/delete/{{$row->id}}">X</a>
        @endif
    </div>
    @endforeach
    <div class="item login">
      Last Logged in: {{date('F d, Y h:ia', Auth::user()->last_login)}}
    </div>
  </div>
</div>
