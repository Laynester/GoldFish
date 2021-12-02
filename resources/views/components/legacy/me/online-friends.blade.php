@props(['onlineFriends'])

<div class="legacy-box">
    <div class="heading">{{ __('My Online Friends') }}</div>
    <div class="content">
        @forelse($onlineFriends as $friend)
            <span class="friend">
                <a href="{{ route('profile.show', $friend) }}">
                    {{ $row->habbo->username }}
                </a>
            </span>
        @empty
            <span class="text-center full">{{ __('You have no friends online') }}</span>
        @endforelse

        @if($onlineFriends->count() >= 5)
            <span class="text-center full">
                {{ __('And many others!') }}
            </span>
        @endif
    </div>
</div>
