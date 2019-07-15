@foreach(App\Models\User\Permissions::where('id', '>=', 3)->orderBy('id','desc')->get() as $rank)
   <div class="box red">
     <div class="heading">{{$rank->rank_name}}</div>
     @foreach(App\Models\User\User::where('rank', '=', $rank->id)->get() as $habbo)
     <a href="/home/{{$habbo->username}}">
      <div class="staff @if ($habbo->online == '1')online @else offline @endif">
        <img class="avatar" src="{{CMSHelper::settings('habbo_imager')}}{{$habbo->look}}&headonly=1&head_direction=3"/>
          <div class="left">
            <span>{{$habbo->username}}<span class="status"></span></span>
            <i>{{$habbo->motto}}</i>
          </div>
          <div class="right">
            <img src="{{CMSHelper::settings('c_images')}}album1584/{{$rank->badge}}.gif">
          </div>
      </div>
    </a>
     @endforeach
   </div>
@endforeach
