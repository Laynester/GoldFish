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
              <label>Code</label>
              <input type="text" name="code" placeholder="Code">
            </div>
          </div>
          <div class="col-md-2">
            <div class="form-group">
              <label for="credits">Credits</label>
              <input type="text" name="credits" value="0" placeholder="Amount">
            </div>
          </div>
          <div class="col-md-2">
            <div class="form-group">
              <label for="points">Points</label>
              <input type="text" name="points" value="0" placeholder="Amount">
            </div>
          </div>
          <div class="col-md-2">
            <div class="form-group">
              <label for="type">Points Type</label>
              <select name="type">
                <option value="0">Duckets</option>
                <option value="5">Diamonds</option>
                <option value="103">Seasonal</option>
              </select>
            </div>
          </div>
          <div class="col-md-2">
            <div class="form-group">
              <label for="item">Catalog Item</label>
              <input type="text" name="item" value="0" placeholder="Item ID">
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
        <th>Code</th>
        <th>Credits</th>
        <th>Points</th>
        <th>Points Type</th>
        <th>Catalog Item</th>
      </thead>
      @foreach ($vouchers as $row)
      <tr>
        <td style="width:20%;">{{ $row->code }}</td>
        <td style="width:20%;">{{ $row->credits }}</td>
        <td style="width:20%;">{{ $row->points }}</td>
        <td style="width:20%;">{{ $row->points_type }}</td>
        <td style="width:20%;">{{ $row->catalog_item_id }}</td>
      </tr>
    @endforeach
    </table>
    <div class="end">
      {{ $vouchers->links() }}
    </div>
  </div>
</div>
