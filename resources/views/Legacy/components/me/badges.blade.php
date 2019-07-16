<div class="legacy-box blue">
  <div class="heading">My Badges</div>
  <div class="content">
    @forelse(\App\Models\User\User_Badges::where('user_id', Auth()->User()->id)->take(35)->get() as $badge)
    <span class="habbo_badge"><img src="{{CMSHelper::settings('c_images')}}album1584/{{$badge->badge_code}}.gif"></span>
    @empty
    <span class="text-center full">You have no badges yet</span>
    @endforelse
  </div>
</div>
