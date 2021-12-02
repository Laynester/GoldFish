@props([
    'title',
    'type',
    'fetch',
    'color',
    'leaderboard',
    'hasRelationship' => false,
])

<div class="legacy-box  {{ $color }}">
    <div class="heading">Top {{ $title }}</div>
    <div class="content">
        @forelse($leaderboard as $habbo)
            <a href="{{ route('profile.show', $hasRelationship ? $habbo->habbo->username : $habbo->username) }}" class="staff leaderboard">
                <img class="avatar"
                     src="{{ CMSHelper::settings('habbo_imager') }}{{ $hasRelationship ? $habbo->habbo->look : $habbo->look }}&headonly=1&head_direction=3"/>
                <div class="left">
                    <span>{{ $hasRelationship ? $habbo->habbo->username : $habbo->username }}</span>
                    <p class="currency {{ $type }}">
                        {{ $habbo[$fetch] }}
                    </p>
                </div>
            </a>
        @empty
            <p class="text-center">{{ __('Currently no leaderboard') }}</p>
        @endforelse
    </div>
</div>
