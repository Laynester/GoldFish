<div class="box blue profile friends">
  <div class="heading">My Friends</div>
    @if(!$friends->isEmpty())
    @foreach($friends as $friend)
      <a href="{{ route('profile.show', [$friend->habbo->username]) }}"><figure class="friend" style="background-image:url({{CMSHelper::settings('habbo_imager')}}{{ $friend->habbo->look }}&direction=4&headonly=1);">{{$friend->habbo->username}}</figure></a>
    @endforeach
    @else
    <center>I have no friends yet.</center>
    @endif
</div>
