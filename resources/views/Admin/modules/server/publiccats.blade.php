<div class="body_content">
  @if(empty($catdata))
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
    <div class="heading">Create Category</div>
    <form method="post">
      <div class="content">
        <div class="row justify-content-center">
          <div class="col-md-3">
            <div class="form-group">
              <label>Name</label>
              <input type="text" placeholder="Name" name="name">
            </div>
          </div>
          <div class="col-md-3">
            <div class="form-group">
              <label>Image</label>
              <select name="image">
                <option value="1">Yes</option>
                <option value="0">No</option>
              </select>
            </div>
          </div>
          <div class="col-md-3">
            <div class="form-group">
              <label>Visibility</label>
              <select name="visible">
                <option value="1">Yes</option>
                <option value="0">No</option>
              </select>
            </div>
          </div>
          <div class="col-md-3">
            <div class="form-group">
              <label>Order Number</label>
              <input type="text" placeholder="Order Number" name="order">
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
        <th>Name</th>
        <th>Image</th>
        <th>Visibility</th>
        <th>Order</th>
        <th>Edit</th>
      </thead>
      @foreach($categories as $row)
      <tr>
        <td style="width:60%;">{{$row->name}}</td>
        <td style="width:10%;">
          @if($row->image == 1)
          Yes
          @else
          No
          @endif
        </td>
        <td style="width:10%;">
          @if($row->visible == 1)
          Yes
          @else
          No
          @endif
        </td>
        <td style="width:10%;">{{$row->order_num}}</td>
        <td style="width:10%;">
          <a href="/housekeeping/server/publiccats/{{$row->id}}">Edit</a></br>
          <a href="/housekeeping/server/publiccats/delete/{{$row->id}}">Remove</a>
        </td>
      </tr>
      @endforeach
    </table>
  </div>
  @else
  <div class="box_4">
    <div class="heading">{{$catdata->name}}</div>
    <form method="post">
      <div class="content">
        @if($errors->any())
        <div class="alert alert-danger" role="alert">
          {{$errors->first()}}
        </div>
        @endif
        <div class="row justify-content-center">
          <div class="col-md-7">
            <input type="text" placeholder="{{$catdata->id}}" hidden value="{{$catdata->id}}" name="id">
            <div class="form-group">
              <label>Name</label>
              <input type="text" placeholder="{{$catdata->name}}" value="{{$catdata->name}}" name="name">
            </div>
            <div class="form-group">
              <label>Image</label>
              <select name="image">
                <option @if($catdata->image == 1) selected @endif value="1">Yes</option>
                <option @if($catdata->image == 0) selected @endif value="0">No</option>
              </select>
            </div>
            <div class="form-group">
              <label>Visibility</label>
              <select name="visible">
                <option @if($catdata->visible == 1) selected @endif value="1">Yes</option>
                <option @if($catdata->visible == 0) selected @endif value="0">No</option>
              </select>
            </div>
            <div class="form-group">
              <label>Order Number</label>
              <input type="text" placeholder="{{$catdata->order_num}}" value="{{$catdata->order_num}}" name="order">
            </div>
          </div>
        </div>
      </div>
      <div class="end">
        <div class="center">
          <button type="submit">Save</button>
        </div>
      </div>
      @csrf
    </form>
  </div>
  @endif
</div>
