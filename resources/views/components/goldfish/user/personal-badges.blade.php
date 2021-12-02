@props(['badges'])

<div class="box badges red">
    <div class="heading">My Badges</div>

    <div class="content">
        @forelse($badges as $badge)
            <span class="habbo_badge">
                <img src="{{ CMSHelper::settings('c_images') }}album1584/{{ $badge->badge_code }}.gif">
            </span>
        @empty
            <div class="text-center">
                You currently got no badges
            </div>
        @endforelse
    </div>
</div>
