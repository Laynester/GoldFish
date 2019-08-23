<div class="box blue profile groups">
  <div class="heading">My Groups</div>
    @if(!$groups->isEmpty())
    @foreach($groups as $group)
      <figure class="group" style="background-image:url({{CMSHelper::settings('group_badges')}}{{$group->guild->badge}}.png);">{{$group->guild->name}}</figure>
    @endforeach
    @else
    <center>I have no Groups yet.</center>
    @endif
</div>
