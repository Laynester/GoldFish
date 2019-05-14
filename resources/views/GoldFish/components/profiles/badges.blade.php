<div class="widget_default_skin home_widget" id="badges">
  <h2 class="default_title">My Badges</h2>
  <div class="widget_default_skin_content">
    @if(!$badges->isEmpty())
    @foreach($badges as $badge)
      <span class="habbo_badge"><img src="{{CMSHelper::settings('c_images')}}album1584/{{$badge->badge_code}}.gif"></span>
    @endforeach
    @else
    <center>You have no badges yet.</center>
    @endif
  </div>
</div>
