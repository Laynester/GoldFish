<div class="box pink">
  <div class="heading">Top Duckets</div>
  <div class="content">
    @foreach($duckets as $currency)
        <a href="/home/{{$currency->habbo->username}}" class="staff leaderboard">
          <img class="avatar" src="{{CMSHelper::settings('habbo_imager')}}{{$currency->habbo->look}}&headonly=1&head_direction=3"/>
          <div class="left">
            <span>{{$currency->habbo->username}}</span>
            <p class="currency duckets">{{$currency->amount}}</p>
          </div>
        </a>
    @endforeach
  </div>
</div>
