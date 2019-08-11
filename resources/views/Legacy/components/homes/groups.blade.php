<div class="widget_golden_skin home-widget friends" style="left:60px;top:700px">
  <div class="heading"><span>{{$user->username}}'s Groups</span></div>
  <div class="body">
    @if($groups->count() > 0)
    <div class="friend-grid">
      @foreach($groups as $row)
      <span class="friend">
        <figure style="background-image:url({{CMSHelper::settings('group_badges')}}{{$row->guild->badge}}.png);"></figure>
        <span class="username">
          <a href="#">{{$row->guild->name}}</a>
        </span>
        <span class="date">
          <i>{{date('d-m-y',$row->guild->date_created)}}</i>
        </span>
      </span>
      @endforeach
    </div>
    @else
    {{$user->username}} is not apart of any groups yet.
    @endif
  </div>
</div>
