@props(['randomUsers'])

<div class="box habbos">
    <div class="heading">{{ __('Random :hotelname', ['hotelname' => CMSHelper::settings('hotelname')]) }}</div>

    <div class="content habbogrid overflow-hidden">
        @foreach($randomUsers as $habbo)
            <span onclick="window.location.href='{{ route('profile.show', [$habbo->username]) }}'" class="ahabbo"
                  onmouseover="openMouth('#habbo{{ $habbo->id }}')" onmouseout="closeMouth('#habbo{{ $habbo->id }}')">
                <div class="legacy-tooltip">
                    <span>{{ $habbo->username }}</span>
                    <span>{{ $habbo->motto }}</span>
                </div>

                <img id="habbo{{ $habbo->id }}" src="{{ CMSHelper::settings('habbo_imager') }} {{ $habbo->look }}?direction=4"/>
            </span>
        @endforeach
    </div>
</div>

<script src="{{ asset('/js/script.js') }}"></script>
