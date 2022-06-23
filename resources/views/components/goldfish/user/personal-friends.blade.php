@props(['friendsOnline'])

<div class="box blue">
    <div class="heading">{{ __('My Online Friends') }}</div>

    <div class="content">
        @forelse($onlineFriends as $friend)
            <span class="friend">
                <a href="{{ route('profile.show', $friend) }}">
                    {{ $friend->habbo->username }}
                </a>
            </span>
        @empty
            <div class="text-center">{{ __('You have no friends online') }}</div>
        @endforelse

        @if($onlineFriends->count() >= 5)
            <div class="text-center">
                {{ __('And many others!') }}
            </div>
        @endif
    </div>
</div>
