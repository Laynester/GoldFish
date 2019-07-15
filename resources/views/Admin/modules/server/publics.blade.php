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
  <div class="box_4">
    <div class="heading">Create public room</div>
    <form method="post">
      <div class="content">
        <div class="row justify-content-center">
          <div class="col-md-3">
            <div class="form-group">
              <label>Category</label>
              <select name="category">
                <option value="-1">Public Rooms</option>
                @foreach($categories as $row)
                <option value="{{$row->id}}">{{$row->name}}</option>
                @endforeach
              </select>
            </div>
          </div>
          <div class="col-md-3">
            <div class="form-group">
              <label>Room ID</label>
              <input type="text" placeholder="Room ID" name="room">
            </div>
          </div>
          <div class="col-md-3">
            <div class="form-group">
            <label>Visibility</label>
              <select name="visible">
                <option value="1">Visible</option>
                <option value="0">Hidden</option>
              </select>
            </div>
          </div>
        </div>
      </div>
      <div class="end">
        <div class="center">
          <button type="submit">Create</button>
        </div>
      </div>
      @csrf
    </form>
  </div>
  <div class="box_4">
    <div class="heading">@yield('title')</div>
    <table class="full normal">
      <thead>
        <th>Room</th>
        <th>Options</th>
      </thead>
      @foreach($publics as $row)
      <tr>
        <td style="width:25%;">{{$row->name}}</td>
        <td style="width:25%;">
          <a href="/housekeeping/server/publics?remove={{$row->id}}">Remove</a>
        </td>
      </tr>
      @endforeach
    </table>
  </div>
  <div class="box_4">
    <div class="heading">Categorized</div>
    <table class="full normal">
      <thead>
        <th>Category</th>
        <th>Room</th>
        <th>Visibility</th>
        <th>Options</th>
      </thead>
      @foreach($rooms1 as $row)
      <tr>
        <td style="width:25%;">{{$row->room->name}}</td>
        <td style="width:25%;">{{$row->category->name}}</td>
        <td style="width:25%;">
          @if($row->visible == 1)
          Yes
          @else
          No
          @endif
        </td>
        <td style="width:25%;">
          @if($row->visible == 1)
          <a href="/housekeeping/server/publics?hide={{$row->room_id}}">Hide</a>
          @else
          <a href="/housekeeping/server/publics?show={{$row->room_id}}">Show</a>
          @endif
          <a href="/housekeeping/server/publics?remove={{$row->room_id}}&type=cateory">Delete</a>
        </td>
      </tr>
      @endforeach
    </table>
  </div>
</div>
