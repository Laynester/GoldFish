@if(!is_null(CMSHelper::settings('discord_id')))
<div class="box discord">
  <div class="heading">Discord</div>
  <div class="content" id="discord-widget"></div>
</div>
<script>window.GLOBAL_ENV = {
  API_ENDPOINT: '//discordapp.com/api',
  WEBAPP_ENDPOINT: '//discordapp.com',
  CDN_HOST: 'cdn.discordapp.com',
  MARKETING_ENDPOINT: '//discordapp.com',
  RELEASE_CHANNEL: 'stable',
};
var serverid = "{{CMSHelper::settings('discord_id')}}";
</script>
<script src="{{ asset('js/discord.js') }}" defer></script>
@endif
