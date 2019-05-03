<div class="box badges">
  <div class="heading">My Badges</div>
  <div class="content">
    @if(!$badges->isEmpty())
    @foreach($badges as $badge)
      <span class="habbo_badge"><img src="{{CMSHelper::settings('c_images')}}album1584/{{$badge->badge_code}}.gif"></span>
    @endforeach
    @else
    <center>You have no badges yet.</center>
    @endif
  </div>
</div>
