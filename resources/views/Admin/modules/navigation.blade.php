@if($group == 'site')
<div class="box_3">
  <div class="heading">Site Settings</div>
  <ul>
    <li><a href="{{ route('hksettings1') }}">General</a></li>
    <li><a href="{{ route('hksettings2') }}">Social</a></li>
  </ul>
</div>
<div class="box_3">
  <div class="heading">Content</div>
  <ul>
    <li><a href="{{ route('hknews') }}">News</a></li>
    <li><a href="{{ route('salert') }}">Site Alert</a></li>
  </ul>
</div>
@endif
