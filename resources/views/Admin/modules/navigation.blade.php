@if($group == 'site')
@if(auth()->user()->rank >= CMSHelper::fuseRights('site_settings_general'))
<div class="box_3">
  <div class="heading">Site Settings</div>
  <ul>
    <li><a href="{{ route('hk_settings1') }}">General</a></li>
    <li><a href="{{ route('hk_settings2') }}">Social</a></li>
  </ul>
</div>
@endif
@if(auth()->user()->rank >= CMSHelper::fuseRights('news'))
<div class="box_3">
  <div class="heading">Content</div>
  <ul>
    <li><a href="{{ route('hk_newslist') }}">News</a></li>
    <li><a href="{{ route('hk_createnews') }}">Create a News Article</a></li>
    @if(auth()->user()->rank >= CMSHelper::fuseRights('site_alert'))
    <li><a href="{{ route('salert') }}">Site Alert</a></li>
    @endif
  </ul>
</div>
@endif
@endif
@if($group == 'user')
<div class="box_3">
  <div class="heading">Moderation</div>
  <ul>
    <li><a href="{{ route('hk_chat_list') }}">Chatlog</a></li>
    <li><a href="{{ route('hk_user_lookup') }}">Lookup User</a></li>
  </ul>
</div>
@endif
