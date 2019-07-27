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
          <div class="col-md-7">
            @foreach($form as $row)
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
      <div class="end">
        <div class="center">
          <button type="submit">Save</button>
        </div>
      </div>
      @csrf
     </form>
  </div>
</div>
