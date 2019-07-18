<div class="widget_golden_skin home-widget friends" style="left:60px;top:700px">
  <div class="heading"><span>{{$user->username}}'s Badges</span></div>
  <div class="body">
    <div class="badge-grid">
      @forelse($groups as $badge)
      <span class="widget_badge" style="background-image:url({{CMSHelper::settings('c_images')}}album1584/{{$badge->badge_code}}.gif);"></span>
      @empty
      {{$user->username}} has no badges yet.
      @endforelse
    </div>
  </div>
</div>
