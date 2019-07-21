<div class="legacy-box gold">
  <div class="heading">Top Credits</div>
  <div class="content">
    @forelse($coins as $habbo)
    <a href="/home/{{$habbo->username}}" class="staff leaderboard">
      <img class="avatar" src="{{CMSHelper::settings('habbo_imager')}}{{$habbo->look}}&headonly=1&head_direction=3"/>
      <div class="left">
        <span>{{$habbo->username}}</span>
        <p class="currency credits">{{$habbo->credits}}</p>
      </div>
    </a>
    @empty
    <p class="text-center">No users</p>
    @endforelse
  </div>
</div>
