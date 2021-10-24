@if($badges->count() > 0)
    <div class="badge-grid">
      @foreach(\App\Models\User\User_Badges::where('user_id', $user->id)->take(16)->get() as $badge)
      <span class="widget_badge" style="background-image:url({{CMSHelper::settings('c_images')}}album1584/{{$badge->badge_code}}.gif);"></span>
      @endforeach
    </div>
    @else
    {{$user->username}} has no badges yet.
    @endif