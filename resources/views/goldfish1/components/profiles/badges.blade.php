<div class="box blue profile badges">
  <div class="heading">My Badges</div>
    @if(!$badges->isEmpty())
    @foreach($badges as $badge)
      <span class="habbo_badge"><img src="{{CMSHelper::settings('c_images')}}album1584/{{$badge->badge_code}}.gif"></span>
    @endforeach
    @else
    <center>I have no badges yet.</center>
    @endif
</div>
