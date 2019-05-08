<div class="box gold">
  <div class="heading">Top Credits</div>
  <div class="content">
    @foreach(App\Models\User\User::where('rank', '<', 3)->orderBy('credits','desc')->take(5)->get() as $habbo)
    <a href="/home/{{$habbo->username}}" class="staff leaderboard">
      <img class="avatar" src="{{CMSHelper::settings('habbo_imager')}}{{$habbo->look}}&headonly=1&head_direction=3"/>
      <div class="left">
        <span>{{$habbo->username}}</span>
        <p class="currency credits">{{$habbo->credits}}</p>
      </div>
  </a>
    @endforeach
  </div>
</div>
