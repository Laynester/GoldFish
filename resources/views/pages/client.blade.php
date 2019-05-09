<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <script
  src="https://code.jquery.com/jquery-3.4.0.min.js"
  integrity="sha256-BJeo0qm959uMBGb65z40ejJYGSgR7REI4+CW1fNKwOg="
  crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="{{ asset('js/browse.js') }}"></script>
    <script src="{{ asset('js/client.js') }}"></script>
    <script src="{{ asset('js/flash_detect_min.js') }}"></script>
    <script src="{{ asset('js/flashclient.js') }}"></script>
    <link href="{{ asset('css/client.css') }}" rel="stylesheet">
    <title>{{CMSHelper::settings('hotelname')}} - Hotel</title>
  </head>
  <body>
    <div id="client-ui">
    <div class="client" id="client"></div>
    <script>
       var Client = new SWFObject("{{CMSHelper::settings('swf')}}?{{time()}}", "client", "100%", "100%", "10.0.0");
       Client.addVariable("client.allow.cross.domain", "1");
       Client.addVariable("client.notify.cross.domain", "0");
       Client.addVariable("connection.info.host", "{{CMSHelper::settings('emuhost')}}");
       Client.addVariable("connection.info.port", "{{CMSHelper::settings('emuport')}}");
       Client.addVariable("site.url", "{{env('APP_URL')}}");
       Client.addVariable("url.prefix", "{{env('APP_URL')}}");
       Client.addVariable("client.reload.url", "{{env('APP_URL')}}/me");
       Client.addVariable("client.fatal.error.url", "{{env('APP_URL')}}/me");
       Client.addVariable("client.connection.failed.url", "{{env('APP_URL')}}/me");
       Client.addVariable("external.override.texts.txt", "{{CMSHelper::settings('override_texts')}}");
       Client.addVariable("external.override.variables.txt", "{{CMSHelper::settings('override_variables')}}");
       Client.addVariable("external.variables.txt", "{{CMSHelper::settings('variables')}}");
       Client.addVariable("external.texts.txt", "{{CMSHelper::settings('texts')}}");
       Client.addVariable("external.figurepartlist.txt", "{{CMSHelper::settings('figuredata')}}");
       Client.addVariable("flash.dynamic.avatar.download.configuration", "{{CMSHelper::settings('figuremap')}}");
       Client.addVariable("productdata.load.url", "{{CMSHelper::settings('productdata')}}");
       Client.addVariable("furnidata.load.url", "{{CMSHelper::settings('furnidata')}}");
       Client.addVariable("use.sso.ticket", "1");
       Client.addVariable("sso.ticket", "{{ Auth::user()->auth_ticket }}");
       Client.addVariable("processlog.enabled", "1");
       Client.addVariable("client.starting", "{{CMSHelper::settings('hotelname')}} is loading...");
       Client.addVariable("flash.client.url", "{{CMSHelper::settings('swfdir')}}");
       Client.addVariable("flash.client.origin", "popup");
       Client.addVariable("ads.domain", "");
       Client.addParam('base', "{{CMSHelper::settings('swfdir')}}");
       Client.addParam('allowScriptAccess', 'always');
       Client.addParam('wmode', "opaque");
       Client.write('client');
       FlashExternalInterface.signoutUrl = "{{env('APP_URL')}}/logout";
       FlashExternalInterface.openNews = function() {
           $( "#news" ).show();
           window.location.href='/me';
       }
       $(document).ready(function() {
       if (FlashDetect.installed) {
       $("#noflash").remove(); }
       if (!FlashDetect.installed) {
       $("#loader").remove(); }
        });
    </script>
    @include('components.client-article')
  </div>
  <habbo-client-error id="noflash">
<div class="client-error__background-frank">
<div class="client-error__text-contents">
<h1 class="client-error__title">You're nearly in {{CMSHelper::settings('hotelname')}}!</h1>
<p>Click the yellow Hotel button below, then click 'run Flash' when prompted to. See you in the Hotel!</p>
</div>
<div class="client-error__hotel-button-div">
<a href="https://www.adobe.com/go/getflashplayer" target="_blank" rel="noopener noreferrer" class="hotel-button">
<span class="hotel-button__text">Hotel</span>
</a>
</div>
</div>
</habbo-client-error>
<div class="loader" id="loader">
  <div class="loading">
    <img src="{{CMSHelper::settings('site_logo')}}"/>
    <div class="loading_bar">
      <div class="loading_bar_inner" id="loader_bar"></div>
    </div>
    <span>Please wait! {{CMSHelper::settings('hotelname')}} is starting up.</span>
  </div>
</div>
  </body>
</html>
