<div class="body_content">
  <div class="box_4">
    <div class="heading">@yield('title')</div>
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
          <div class="col-md-2">
            <div class="form-group">
              <label>Word</label>
              <input type="text" name="key" placeholder="Word to Filter">
            </div>
          </div>
          <div class="col-md-2">
            <div class="form-group">
              <label>Replacement</label>
              <input type="text" name="replacement" value="bobba">
            </div>
          </div>
          <div class="col-md-2">
            <div class="form-group">
              <label>Hide</label>
              <select name="hide">
                <option value="0">No</option>
                <option value="1">Yes</option>
              </select>
            </div>
          </div>
          <div class="col-md-2">
            <div class="form-group">
              <label>Report</label>
              <select name="report">
                <option value="0">No</option>
                <option value="1">Yes</option>
              </select>
            </div>
          </div>
          <div class="col-md-2">
            <div class="form-group">
              <label>Mute</label>
              <select name="mute">
                <option value="0">No</option>
                <option value="1">Yes</option>
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
        <th>Word</th>
        <th>Replacement</th>
        <th>Hide</th>
        <th>Report</th>
        <th>Mute</th>
      </thead>
      @foreach ($words as $row)
      <tr>
        <td style="width:20%;">{{ $row->key }}</td>
        <td style="width:20%;">{{ $row->replacement }}</td>
        <td style="width:20%;">
          @if($row->hide == 1)
          Yes
          @else 
          No
          @endif
        </td>
        <td style="width:20%;">
            @if($row->report == 1)
            Yes
            @else 
            No
            @endif
          </td>
          <td style="width:20%;">
              @if($row->mute == 1)
              Yes
              @else 
              No
              @endif
            </td>
      </tr>
    @endforeach
    </table>
    <div class="end">
      {{ $words->links() }}
    </div>
  </div>
</div>
