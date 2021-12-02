@props(['badges'])

<div class="legacy-box blue">
    <div class="heading">{{ __('My badges')}}</div>

    <div class="content">
        @forelse($badges as $badge)
            <span class="habbo_badge">
                <img src="{{ CMSHelper::settings('c_images') }}album1584/{{ $badge->badge_code }}.gif">
            </span>
        @empty
            <span class="text-center full">{{ __('You have no badges yet') }}</span>
        @endforelse
    </div>
</div>
