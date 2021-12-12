<div class="col-lg-4">
    <div class="box black">
        <div class="heading">{{ __('Settings') }}</div>
        <ul>
            <li>
                <a href="{{ route('settings.hotel.edit') }}">
                    {{ __('Site Preferences') }}
                </a>
            </li>

            <li>
                <a href="{{ route('settings.password.edit') }}">
                    {{ __('Password Settings') }}
                </a>
            </li>
        </ul>
    </div>
</div>
