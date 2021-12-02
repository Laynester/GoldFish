@props(['alerts'])

<div class="legacy-box grey preload meview">
    <div class="heading">
        {{ auth()->user()->username }}
        <small class="right">
            {{ __('Last signed in:') }} {{ date('d/m/y h:ia', auth()->user()->last_login) }}
        </small>
    </div>

    <div class="content">
        <div class="row justify-content-center overflow-hidden">
            <div class="col-5 col-sm-5" style="margin-top: -20px;">
                <div class="plate">
                    <img src="{{ CMSHelper::settings('habbo_imager') }}{{ auth()->user()->look }}">
                </div>
            </div>
            <div class="col-7 col-sm-7">
                <div class="px-2 py-2 d-flex flex-column rounded text-white"
                     style="font-size: 14px; background: rgba(0,0,0,0.5)">
                    <div>
                        <img class="w-6 h-6" src="{{ asset('legacy/images/motto.png') }}" alt="{{ __('Motto') }}">
                        {{ auth()->user()->motto ?? '' }}
                    </div>
                    <div class="d-flex align-items-center" style="gap: 5px;">
                        <img class="w-6 h-6" src="{{ asset('legacy/images/credits.png') }}" alt="{{ __('Credits') }}">
                        {{ auth()->user()->credits }} {{ __('Credits') }}
                    </div>
                    <div class="d-flex align-items-center" style="gap: 5px;">
                        <img class="w-6 h-6" src="{{ asset('legacy/images/duckets.png') }}" alt="{{ __('Duckets') }}">
                        {{ auth()->user()->duckets->amount ?? 0 }} {{ __('Duckets') }}
                    </div>
                    <div class="d-flex align-items-center" style="gap: 5px;">
                        <img class="w-6 h-6" src="{{ asset('legacy/images/diamonds.png') }}" alt="">
                        {{ auth()->user()->diamonds->amount ?? 0 }} {{ __('Diamonds') }}
                    </div>
                </div>
            </div>
        </div>
        <div class="feed-items">
            @foreach($alerts as $alert)
                <div class="alert item {{ $alert->userid == 0 ? 'mass' : '' }}">
                    <img src="{{CMSHelper::settings('c_images')}}album1584/{{$alert->icon}}.gif"/>

                    <span>
                        {{ $alert->message }}
                    </span>

                    @if($alert->userid == auth()->user()->id)
                        <a class="close" href="me/delete/{{ $alert->id }}">X</a>
                    @endif
                </div>
            @endforeach
        </div>
    </div>
</div>
