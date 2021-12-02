<div class="navbar">
    <div class="container">
        <ul class="navigation">
            @guest
                <li>
                    <a href="/" class="{{ $group == 'home' ? 'selected' : '' }}">
                        {{ __('Home') }}
                    </a>
                </li>

                <li>
                    <a href="{{ route('register') }}" class="{{ $group == 'register' ? 'selected' : '' }}">
                        {{ __('Register') }}
                    </a>
                </li>
            @endguest

            @auth
                <li>
                    <a href="{{ route('me.index') }}" class="{{ $group === 'home' ? 'selected' : '' }}">
                        {{ __('Home') }}
                    </a>
                </li>
            @endauth

            <li>
                <a href="{{ route('community.index') }}" class="{{ $group === 'community' ? 'selected' : '' }}">
                    {{ __('Community') }}
                </a>
            </li>
            @auth
                <li>
                    <a href="#" class="{{ $group === 'shop' ? 'selected' : '' }}">
                        {{ __('Shop') }}
                    </a>
                </li>

                @if(CMSHelper::fuseRights('dashboard'))
                    <li>
                        <a href="{{ route('hk.index') }}">{{ __('Housekeeping') }}</a>
                    </li>
                @endif

                <a
                    class="enter_hotel right relative"
                    href="{{ route('flash.index') }}"
                    target="_blank">
                    {{ __('Flash') }}
                </a>
                <a
                    class="enter_hotel right relative"
                    href="{{ route('nitro.index') }}"
                    target="_blank">
                    {{ __('Nitro') }}
                </a>
            @endauth
        </ul>
    </div>
</div>
<div class="sub-navigation">
    <div class="container">
        <ul class="navigation">
            @if($group === 'home' && auth()->check())
                <x-child-navigation
                    :name="__('Home')"
                    :url="route('me.index')"
                    :isActive="Request::is('user/me')"
                />
                <x-child-navigation
                    :name="__('Settings')"
                    :url="route('settings.index')"
                    :isActive="Request::is('user/settings*')"
                />
                <x-child-navigation
                    :name="__('My page')"
                    :url="route('profile.show', auth()->user()->username)"
                    :isActive="Request::is('user/home*')"
                />
            @endif

                @if($group === 'community')
                    <x-child-navigation
                            :name="__('Community')"
                            :url="route('community.index')"
                            :isActive="Request::is('community')"
                    />
                    <x-child-navigation
                            :name="__('Articles')"
                            :url="route('articles.index')"
                            :isActive="Request::is('community/articles*')"
                    />
                    <x-child-navigation
                            :name="__('Leaderboards')"
                            :url="route('leaderboards.index')"
                            :isActive="Request::is('community/leaderboards')"
                    />
                    <x-child-navigation
                            :name="__('Staff')"
                            :url="route('staff.index')"
                            :isActive="Request::is('community/staff')"
                    />
                    <x-child-navigation
                            :name="__('Photos')"
                            :url="route('photos.index')"
                            :isActive="Request::is('community/photos')"
                    />
                @endif

                @if($group === 'shop')
                    <x-child-navigation
                            :name="__('Shop')"
                            url="#"
                            :isActive="Request::is('shop*')"
                    />
                @endif
        </ul>
    </div>
</div>
