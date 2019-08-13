<div class="legacy-box blue">
  <div class="heading">Top Respects Gained</div>
  <div class="content">
    @forelse($respects_gained as $row)
    <a href="/home/{{$row->habbo->username}}" class="staff leaderboard">
      <img class="avatar" src="{{CMSHelper::settings('habbo_imager')}}{{$row->habbo->look}}&headonly=1&head_direction=3"/>
      <div class="left">
        <span>{{$row->habbo->username}}</span>
        <p class="currency respects">{{$row->respects_received}}</p>
      </div>
    </a>
    @empty
    <p class="text-center">No users</p>
    @endforelse
  </div>
</div>
