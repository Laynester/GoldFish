@props(['user', 'rooms'])

<div class="box blue profile rooms">
    <div class="heading">{{ __(':username rooms', ['username' => $user->username]) }}</div>
    @forelse($rooms as $room)
        <figure class="room">{{ $room->name }}</figure>
    @empty
        <p class="text-center">{{ __(':username currently has no rooms', ['username' => $user->username]) }}</p>
    @endforelse
</div>
