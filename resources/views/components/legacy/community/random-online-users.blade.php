@props(['randomOnlineUsers'])

<div class="legacy-box habbos">
    <div class="heading">
        {{ __('Random online users') }}
    </div>

    @if($randomOnlineUsers->count() > 0)
        <div class="content habbogrid">
            @foreach($randomOnlineUsers as $user)
                <span onclick="window.location.href='{{ route('profile.show', $user->username) }}'" class="ahabbo"
                      onmouseover="openMouth('#habboid{{$user->id}}')"
                      onmouseout="closeMouth('#habboid{{$user->id}}')">

                    <div class="legacy-tooltip">
                        <span>{{ $user->username }}</span>
                        <span>{{ $user->motto }}</span>
                    </div>

                    <img id="habboid{{ $user->id }}" src="{{ CMSHelper::settings('habbo_imager') }}{{ $user->look }}?direction=4"/>
                </span>
            @endforeach
        </div>
    @else
        <p class="text-center mt-2">
            {{ __('There is currently no users online.') }}
        </p>
    @endif
</div>
