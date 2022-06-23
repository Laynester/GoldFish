<div class="container">
    <footer class="home">
        {{ __('Habbo is a registered trademark of Sulake Corporation. All rights reserved to their respective owner(s)') }}<br>
        &copy {{ date('Y') }} {{ __(':hotel is a not for profit educational project and is in no way affiliated with Habbo or Sulake Corporation', ['hotel' => ENV('APP_NAME')]) }}<br>
        <span style="font-size: 12px;">
            {{ __('Goldfish CMS') }} <strong>v{{ config('app.version_number') }}</strong>.
            {{ __('Current Laravel version') }} v{{ Illuminate\Foundation\Application::VERSION }} - {{ __('Current PHP version') }} v{{ PHP_VERSION }}
        </span>

    </footer>
</div>
