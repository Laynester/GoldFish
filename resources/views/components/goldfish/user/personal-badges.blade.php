@props(['badges'])

<div class="box badges red">
    <div class="heading">{{ __('My Badges') }}</div>

    <div class="content">
        @forelse($badges as $badge)
            <span class="habbo_badge">
                <img src="{{ CMSHelper::settings('c_images') }}album1584/{{ $badge->badge_code }}.gif" alt="{{ $badge->badge_code }}">
            </span>
        @empty
            <div class="text-center">
                {{ __('You currently have no badges') }}
            </div>
        @endforelse
    </div>
</div>
