<div class="widget_default_skin home-widget home-badges">
  <h2 class="default_title">
    {{$user->username}}'s Badges
  </h2>
  <div class="widget_default_skin_content">
    @forelse(\App\Models\User\User_Badges::where('user_id', Auth()->User()->id)->take(16)->get() as $badge)
    <span class="habbo_badge"><img src="{{CMSHelper::settings('c_images')}}album1584/{{$badge->badge_code}}.gif"></span>
    @empty
    {{$user->username}} has no badges yet.
    @endforelse
  </div>
</div>
