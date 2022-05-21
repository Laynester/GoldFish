@if($friends->count() > 0)
    <div class="friend-grid">
      @foreach($friends as $row)
      <span class="friend">
        <figure style="background-image:url({{ sprintf('%s%s%s', CMSHelper::settings('habbo_imager'), $row->friend->look, '&direction=4&headonly=1') }});"></figure>
        <span class="username">
          <a href="{{ route('profile.show', [$row->friend->username]) }}">{{$row->friend->username}}</a>
        </span>
        <span class="date">
          <i>{{date('d-m-y',$row->friends_since)}}</i>
        </span>
      </span>
      @endforeach
    </div>
    @else
    {{$user->username}} has no friends yet.
    @endif