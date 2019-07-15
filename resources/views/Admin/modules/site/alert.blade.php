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
    <div class="heading">@yield('title')</div>
    <form method="post">
      <div class="content">
        <div class="row justify-content-center">
          <div class="col-md-4">
            <div class="form-group">
              <label>Message</label>
              <input type="text" name="message" placeholder="Message">
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
              <label>Icon</label>
              <input type="text" name="icon" placeholder="Badge in C_IMAGES">
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
              <label>UserID</label>
              <input type="text" value="0" name="userid" placeholder="Can be left blank">
            </div>
          </div>
        </div>
      </div>
      <div class="end">
        <div class="center">
          <button type="submit">Send</button>
        </div>
      </div>
      @csrf
     </form>
  </div>
  <div class="box_4">
    <div class="heading">@yield('title')</div>
    <table class="full normal">
      <thead>
        <th>Message</th>
        <th>Icon</th>
        <th>User</th>
        <th>Options</th>
      </thead>
      @foreach(App\Models\CMS\Alerts::orderBy('id','DESC')->get() as $row)
      <tr>
        <td style="width:25%; text-align:center;">{{$row->message}}</td>
        <td style="width:25%;text-align:center;">{{$row->icon}}</td>
        <td style="width:25%;text-align:center;">
          @if($row->userid == 0)
          None
          @else
          {{$row->habbo->username}}
          @endif
        </td>
        <td style="width:25%;text-align:center;">
          <a href="?delete={{$row->id}}">Remove</a>
        </td>
      </tr>
      @endforeach
    </table>
  </div>
</div>
