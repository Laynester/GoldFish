<div class="container">
    <footer class="home">
        {{ __('Goldfish CMS') }} <strong>v{{ config('app.version_number') }}</strong> -
        {{ __('Made with') }} <i class="icon ion-heart"></i> {{ __('by') }}
        <a href="https://devbest.com/members/laynester.83341/">Laynester</a>
        {{ __('and maintained by') }} <a href="https://devbest.com/members/object.78351/">Object</a>
        <br>
        &copy {{ date('Y') }} {{ __('HABBO is a registered trademark of Sulake Corporation. All rights reserved to their respective owner(s).') }}
        <br>
        <span style="font-size: 12px;">
            {{ __('Current Laravel version') }} v{{ Illuminate\Foundation\Application::VERSION }} - {{ __('Current PHP version') }} v{{ PHP_VERSION }}
        </span>

    </footer>
</div>
