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
              <label>{{str_replace(".", " ", "$row->key")}}</label>
              <input type="hidden" name="key[{{$row->key}}][name]" value="{{$row->key}}">
              <input type="text" name="key[{{$row->key}}][value]" value="{{$row->value}}">
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
