@if($friends->count() > 0)
    <div class="friend-grid">
      @foreach($friends as $row)
      <span class="friend">
        <figure style="background-image:url({{CMSHelper::settings('habbo_imager')}}{{ $row->habbo->look }}&direction=4&headonly=1);"></figure>
        <span class="username">
          <a href="{{ route('home', [$row->habbo->username]) }}">{{$row->habbo->username}}</a>
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