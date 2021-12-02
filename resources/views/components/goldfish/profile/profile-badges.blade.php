@props(['user', 'badges'])

<div class="box blue profile badges">
    <div class="heading">{{ __(':username Badges', ['username' => $user->username]) }}</div>
    @forelse($badges as $badge)
        <span class="habbo_badge">
                <img src="{{ CMSHelper::settings('c_images') }}album1584/{{$badge->badge_code}}.gif"></span>
    @empty
        <p class="center">{{ __(':username currently has no badges.', ['username' => $user->username]) }}</p>
    @endforelse
</div>