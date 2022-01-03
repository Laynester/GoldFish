@props(['alerts'])

<div class="box meview" style="background-image:url('/assets/goldfish/images/me/views/{{ auth()->user()->hotelview }}');">
    <div class="plate">
        <img src="{{ CMSHelper::settings('habbo_imager')}}{{ auth()->user()->look }}">
    </div>

    <a class="enter_hotel" href="{{ route('nitro.index') }}" target="_blank">
        {{ __('Enter :hotelname', ['hotelname' => CMSHelper::settings('hotelname')]) }}
    </a>

    <div class="habbo-info">
        <div class="motto">
            <strong>{{ auth()->user()->username }}:
            </strong> {{ auth()->user()->motto }}
        </div>
    </div>

    <div class="feed-items">
        @foreach($alerts as $alert)
            <div class="alert item">
                <img src="{{ CMSHelper::settings('c_images') }}album1584/{{ $alert->icon }}.gif"/>
                <span>{{ $alert->message }}</span>
                @if($alert->userid == Auth::user()->id)
                    <a class="close" href="me/delete/{{ $alert->id }}">X</a>
                @endif
            </div>
        @endforeach

        <div class="item login">
            {{ __('Last Logged in:') }} {{ date('F d, Y h:ia', auth()->user()->last_login) }}
        </div>
    </div>
</div>
