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
            <div class="form-group">
              <label>Emu Host</label>
              <input type="text" name="emuhost" value="{{CMSHelper::settings('emuhost')}}">
            </div>
            <div class="form-group">
              <label>Emu Port</label>
              <input type="text" name="emuport" value="{{CMSHelper::settings('emuport')}}">
            </div>
            <div class="form-group">
              <label>Rcon IP</label>
              <input type="text" name="rconip" value="{{CMSHelper::settings('rconip')}}">
            </div>
            <div class="form-group">
              <label>Rcon Port</label>
              <input type="text" name="rconport" value="{{CMSHelper::settings('rconport')}}">
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
</div>
