@if($rooms->count() > 0)
<div class="room_content">
  @foreach($rooms as $room)
  <div class="room"><p class="room_title">{{$room->name}}</p><a target="_blank" href="/client?room={{$room->id}}">Enter Room</a></div>
  @endforeach
</div>
@else
I have no rooms yet!
@endif