@forelse($employees as $staff)
    <div class="legacy-box meview staff">
        <div class="heading">{{ $staff->username }}</div>
        <div class="content">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="plate">
                        <img src="{{ CMSHelper::settings('habbo_imager') }}
                        {{ $staff->look }}">
                    </div>
                </div>
                <div class="col-lg-6">
                    <span>
                        <a href="{{ route('profile.show', $staff->username)  }}">
                            {{ $staff->username }}
                        </a>
                    </span>
                    <span>
                        <b>{{ $staff->rank_name->rank_name }}</b>
                    </span>
                    <span>
                        <img src="{{ CMSHelper::settings('c_images') }}album1584/{{ $staff->rank_name->badge }}.gif">
                    </span>
                </div>
            </div>
        </div>
    </div>
@empty
    <p class="text-center">{{ __('There is currently no staff on :hotelname hotel', ['hotelname' => CMSHelper::settings('hotelname')]) }}</p>
@endforelse