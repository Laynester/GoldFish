<div class="body_content">
  @if($errors->any())
  <div class="alert alert-danger" role="alert">
    {{$errors->first()}}
  </div>
  @endif
  @if(session('success'))
  <div class="alert alert-success" role="alert">
    {{session('success')}}
  </div>
  @endif
  <div class="row">
    <div class="col-lg-6">
      <div class="box_4">
        <div class="heading">Lookup by Room</div>
        <form method="post" action="{{ route('hk.chat-list') }}">
          <div class="content">
            <div class="row justify-content-center">
              <div class="col-md-6">
                <div class="form-group">
                  <input type="text" name="room" placeholder="Room ID">
                </div>
              </div>
            </div>
          </div>
          <div class="end">
            <div class="center">
              <button type="submit">Search</button>
            </div>
          </div>
          @csrf
        </form>
      </div>
    </div>
    <div class="col-lg-6">
      <div class="box_4">
        <div class="heading">Lookup by Username</div>
        <form method="post" action="{{ route('hk.chat-list') }}">
          <div class="content">
            <div class="row justify-content-center">
              <div class="col-md-6">
                <div class="form-group">
                  <input type="text" name="user" placeholder="Username">
                </div>
              </div>
            </div>
          </div>
          <div class="end">
            <div class="center">
              <button type="submit">Search</button>
            </div>
          </div>
          @csrf
        </form>
      </div>
    </div>
  </div>
  <div class="box_4">
    <div class="heading">@yield('title')</div>
    <table class="full normal">
      <thead>
        <th>Room</th>
        <th>User</th>
        <th>Message</th>
        <th>Date</th>
      </thead>
      @foreach ($chatlog as $chat)
      <tr>
        <td style="width:25%;">{{$chat->room->name}}</td>
        <td style="width:25%;">{{$chat->habbo->username}}</td>
        <td style="width:25%;">{{$chat->message}}</td>
        <td style="width:25%;">{{date('d/m/y h:ia', $chat->timestamp)}}</td>
      </tr>
      @endforeach
    </table>
    <div class="end">
      {{ $chatlog->links() }}
    </div>
  </div>
</div>
