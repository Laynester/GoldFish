@if($group == 'server')
@if(CMSHelper::fuseRights('navi_server_settings'))
<div class="box_3">
  <div class="heading">Server Settings</div>
  <ul>
    @if(CMSHelper::fuseRights('server_client'))
    <li><a href="{{ route('hk_server_client') }}">Client</a></li>
    @endif
    @if(CMSHelper::fuseRights('server_emulator'))
    <li><a href="{{ route('hk_server_emulator') }}">Emulator</a></li>
    @endif
  </ul>
</div>
@endif
@if(CMSHelper::fuseRights('navi_server_navigation'))
<div class="box_3">
  <div class="heading">Navigation</div>
  <ul>
    @if(CMSHelper::fuseRights('server_publics'))
    <li><a href="{{ route('hk_server_publics') }}">Public Rooms</a></li>
    @endif
    @if(CMSHelper::fuseRights('server_publiccats'))
    <li><a href="{{ route('hk_server_publiccats') }}">Public Categories</a></li>
    @endif
  </ul>
</div>
@endif
@if(CMSHelper::fuseRights('navi_server_hotel'))
<div class="box_3">
  <div class="heading">Hotel</div>
  <ul>
    @if(CMSHelper::fuseRights('server_vouchers'))
    <li><a href="{{ route('hk_server_vouchers') }}">Voucher Codes</a></li>
    @endif
    @if(CMSHelper::fuseRights('server_rcon'))
    <li><a href="{{ route('hk_server_rcon') }}">RCON</a></li>
    @endif
  </ul>
</div>
@endif
@endif
@if($group == 'site')
@if(CMSHelper::fuseRights('navi_site_settings'))
<div class="box_3">
  <div class="heading">Site Settings</div>
  <ul>
    @if(CMSHelper::fuseRights('site_settings_general'))
    <li><a href="{{ route('hk_settings1') }}">General</a></li>
    @endif
    @if(CMSHelper::fuseRights('site_settings_social'))
    <li><a href="{{ route('hk_settings2') }}">Social</a></li>
    @endif
  </ul>
</div>
@endif
@if(CMSHelper::fuseRights('navi_site_content'))
<div class="box_3">
  <div class="heading">Content</div>
  <ul>
    @if(CMSHelper::fuseRights('site_news'))
    <li><a href="{{ route('hk_newslist') }}">News</a></li>
    <li><a href="{{ route('hk_createnews') }}">Create a News Article</a></li>
    @endif
    @if(CMSHelper::fuseRights('site_alert'))
    <li><a href="{{ route('salert') }}">Site Alert</a></li>
    @endif
  </ul>
</div>
@endif
@endif
@if($group == 'user')
@if(CMSHelper::fuseRights('navi_usermod_moderation'))
<div class="box_3">
  <div class="heading">Moderation</div>
  <ul>
    @if(CMSHelper::fuseRights('moderation_chatlog'))
    <li><a href="{{ route('hk_chat_list') }}">Chatlog</a></li>
    @endif
    @if(CMSHelper::fuseRights('moderation_user'))
    <li><a href="{{ route('hk_user_lookup') }}">Lookup User</a></li>
    @endif
    @if(CMSHelper::fuseRights('moderation_banlist'))
    <li><a href="{{ route('hk_user_bans') }}">Bans</a></li>
    @endif
  </ul>
</div>
@endif
@if(CMSHelper::fuseRights('navi_usermod_users'))
<div class="box_3">
  <div class="heading">Users</div>
  <ul>
    @if(CMSHelper::fuseRights('moderation_badges'))
    <li><a href="{{ route('hk_user_badges') }}">Give a Badge</a></li>
    @endif
  </ul>
</div>
@endif
@endif
