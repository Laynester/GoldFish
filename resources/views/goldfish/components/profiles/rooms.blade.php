<div class="box blue profile rooms">
  <div class="heading">My Rooms</div>
    @if(!$rooms->isEmpty())
    @foreach($rooms as $room)
      <figure class="room">{{$room->name}}</figure>
    @endforeach
    @else
    <center>I have no Rooms yet.</center>
    @endif
</div>
