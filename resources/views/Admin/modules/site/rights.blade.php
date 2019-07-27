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
        <ul  class="nav nav-pills">
          <li class="active">
            <a  href="#1a" data-toggle="tab">Tabs</a>
          </li>
          <li>
            <a href="#2a" data-toggle="tab">Sub Navigation Boxes</a>
          </li>
          <li>
            <a href="#3a" data-toggle="tab">Sub Navigation Links</a>
          </li>
        </ul>
        <div class="row justify-content-center">
          <div class="col-md-7">
            <div class="tab-content clearfix">
              <div class="tab-pane active" id="1a">
                @foreach($tabs as $row)
                <div class="form-group">
                  <label class="left">{{$row->desc}}</label><small class="right">({{$row->right}})</small>
                  <input type="hidden" name="key[{{$row->right}}][name]" value="{{$row->right}}">
                  <select name="key[{{$row->right}}][value]">
                    @foreach($permissions as $row2)
                    <option value="{{$row2->id}}" @if($row->min_rank == $row2->id) selected @endif>{{$row2->rank_name}}</option>
                    @endforeach
                  <select>
                </div>
                @endforeach
              </div>
              <div class="tab-pane" id="2a">
                @foreach($subnavi as $row)
                <div class="form-group">
                  <label class="left">{{$row->desc}}</label><small class="right">({{$row->right}})</small>
                  <input type="hidden" name="key[{{$row->right}}][name]" value="{{$row->right}}">
                  <select name="key[{{$row->right}}][value]">
                    @foreach($permissions as $row2)
                    <option value="{{$row2->id}}" @if($row->min_rank == $row2->id) selected @endif>{{$row2->rank_name}}</option>
                    @endforeach
                  <select>
                </div>
                @endforeach
              </div>
              <div class="tab-pane" id="3a">
                @foreach($links as $row)
                <div class="form-group">
                  <label class="left">{{$row->desc}}</label><small class="right">({{$row->right}})</small>
                  <input type="hidden" name="key[{{$row->right}}][name]" value="{{$row->right}}">
                  <select name="key[{{$row->right}}][value]">
                    @foreach($permissions as $row2)
                    <option value="{{$row2->id}}" @if($row->min_rank == $row2->id) selected @endif>{{$row2->rank_name}}</option>
                    @endforeach
                  <select>
                </div>
                @endforeach
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="end">
        <div class="center">
          <button name="submit" value="Save Tabs" type="submit">Save</button>
        </div>
      </div>
      @csrf
     </form>
  </div>
</div>
