<div class="widget_default_skin home-widget rooms" style="left:60px;top:400px;">
  <div class="heading">
    <span>{{$user->username}}'s Rooms</span>
  </div>
  <div class="body">
    @if($rooms->count() > 0)
    <div class="room_content">
      @foreach($rooms as $room)
      <div class="room"><p class="room_title">{{$room->name}}</p><a target="_blank" href="/client?room={{$room->id}}">Enter Room</a></div>
      @endforeach
    </div>
    @else
    I have no rooms yet!
    @endif
  </div>
</div>
