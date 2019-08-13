<div class="box red">
  <div class="heading">Top Achievement score</div>
  <div class="content">
    @forelse($achievement as $row)
    <a href="/home/{{$row->habbo->username}}" class="staff leaderboard">
      <img class="avatar" src="{{CMSHelper::settings('habbo_imager')}}{{$row->habbo->look}}&headonly=1&head_direction=3"/>
      <div class="left">
        <span>{{$row->habbo->username}}</span>
        <p class="currency achievement">{{$row->achievement_score}}</p>
      </div>
    </a>
    @empty
    <p class="text-center">No users</p>
    @endforelse
  </div>
</div>
