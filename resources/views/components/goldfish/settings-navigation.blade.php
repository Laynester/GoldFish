<div class="col-lg-4">
    <div class="box black">
        <div class="heading">{{ __('Settings') }}</div>

        <div class="settings-nav">
            <a href="{{ route('settings.hotel.edit') }}">
                {{ __('Site Preferences') }}
            </a>

            <a href="{{ route('settings.password.edit') }}">
                {{ __('Password Settings') }}
            </a>
        </div>
    </div>
</div>
