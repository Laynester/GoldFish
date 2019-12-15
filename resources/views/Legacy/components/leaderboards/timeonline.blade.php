<div class="legacy-box">
  <div class="heading">Top Online Time</div>
  <div class="content">
    @forelse($time as $row)
    <a href="/home/{{$row->habbo->username}}" class="staff leaderboard">
      <img class="avatar" src="{{CMSHelper::settings('habbo_imager')}}{{$row->habbo->look}}&headonly=1&head_direction=3"/>
      <div class="left">
        <span>{{$row->habbo->username}}</span>
        <p class="currency timeon">{{CMSHelper::minsToTime($row->progress)}}</p>
      </div>
    </a>
    @empty
    <p class="text-center">No users</p>
    @endforelse
  </div>
</div>
