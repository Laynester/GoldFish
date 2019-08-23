<div class="legacy-box grey preload meview">
  <div class="heading">{{ Auth::user()->username }}<small class="right">Last signed in: {{date('d/m/y h:ia', Auth::user()->last_login)}}</small></div>
  <div class="content">
    <div class="row justify-content-center">
      <div class="col-sm-6">
        <div class="plate">
          <img src="{{CMSHelper::settings('habbo_imager')}}{{ Auth::user()->look }}">
        </div>
      </div>
      <div class="col-sm-6">
        <a class="faux-button green" href="{{ route('client') }}" target="_blank">
          Enter {{CMSHelper::settings('hotelname')}}
        </a>
      </div>
    </div>
    <div class="feed-items">
      @foreach(App\Models\CMS\Alerts::orderBy('id','DESC')->orderBy('userid', 'desc')->get() as $row)
      <div class="alert item @if($row->userid == 0) mass @endif">
        <img src="{{CMSHelper::settings('c_images')}}album1584/{{$row->icon}}.gif"/>
        <span>{{$row->message}}</span>
          @if($row->userid == Auth::user()->id)
          <a class="close" href="me/delete/{{$row->id}}">X</a>
          @endif
      </div>
      @endforeach
    </div>
  </div>
</div>
