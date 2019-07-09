<div class="body_content">
  <div class="box_4">
    <div class="heading">Ban user</div>
    <form method="post">
      <div class="content">
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
        <div class="row justify-content-center">
          <div class="col-md-3">
            <div class="form-group">
              <label>Time</label>
              <select name="time">
                <option value="86400">24 Hour</option>
                <option value="604800">1 Week</option>
                <option value="2592000">1 Month</option>
                <option value="7776000">3 Months</option>
                <option value="15552000">6 Months</option>
                <option value="31104000">1 Year</option>
                <option value="94608000">Permanent</option>
                <option value="super">Super</option>
              </select>
            </div>
          </div>
          <div class="col-md-3">
            <div class="form-group">
              <label>User</label>
              <input type="text" placeholder="User" name="username">
            </div>
          </div>
          <div class="col-md-3">
            <div class="form-group">
              <label>Reason</label>
              <input type="text" placeholder="reason" name="reason">
            </div>
          </div>
        </div>
      </div>
      <div class="end">
        <div class="center">
          <button type="submit">Ban</button>
        </div>
      </div>
      @csrf
    </form>
  </div>
  <div class="box_4">
    <div class="heading">@yield('title')</div>
      <table class="full normal">
        <thead>
          <th>User</th>
          <th>Reason</th>
          <th>When</th>
          <th>Moderator</th>
        </thead>
        @foreach ($bans as $row)
        <tr>
          <td>{{$row->habbo->username}}</td>
          <td>{{$row->ban_reason}}</td>
          <td>{{date('F d, Y, H:ia',$row->timestamp)}}</td>
          <td>{{$row->moderator->username}}</td>
        </tr>
        @endforeach
      </table>
    <div class="end">
      {{ $bans->links() }}
    </div>
  </div>
</div>
