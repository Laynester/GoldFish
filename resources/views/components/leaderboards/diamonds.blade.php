<div class="box diamond">
  <div class="heading">Top Diamonds</div>
  <div class="content">
    @foreach($diamonds as $currency)
        <a href="/home/{{$currency->habbo->username}}" class="staff leaderboard">
          <img class="avatar" src="{{CMSHelper::settings('habbo_imager')}}{{$currency->habbo->look}}&headonly=1&head_direction=3"/>
          <div class="left">
            <span>{{$currency->habbo->username}}</span>
            <p class="currency diamonds">{{$currency->amount}}</p>
          </div>
        </a>
    @endforeach
  </div>
</div>
