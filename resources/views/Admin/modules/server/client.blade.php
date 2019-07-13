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
              <input class="inputs" type="text" name="emuhost" value="{{CMSHelper::settings('emuhost')}}">
            </div>
            <div class="form-group">
              <label>Emu Port</label>
              <input class="inputs" type="text" name="emuport" value="{{CMSHelper::settings('emuport')}}">
            </div>
            <div class="form-group">
              <label>Rcon IP</label>
              <input class="inputs" type="text" name="rconip" value="{{CMSHelper::settings('rconip')}}">
            </div>
            <div class="form-group">
              <label>Rcon Port</label>
              <input class="inputs" type="text" name="rconport" value="{{CMSHelper::settings('rconport')}}">
            </div>
            <div class="form-group">
              <label>SWF Directory</label>
              <input class="inputs" type="text" name="swfdir" value="{{CMSHelper::settings('swfdir')}}">
            </div>
            <div class="form-group">
              <label>SWF</label>
              <input class="inputs" type="text" name="swf" value="{{CMSHelper::settings('swf')}}">
            </div>
            <div class="form-group">
              <label>Variables</label>
              <input class="inputs" type="text" name="variables" value="{{CMSHelper::settings('variables')}}">
            </div>
            <div class="form-group">
              <label>Override Variables</label>
              <input class="inputs" type="text" name="override_variables" value="{{CMSHelper::settings('override_variables')}}">
            </div>
            <div class="form-group">
              <label>Texts</label>
              <input class="inputs" type="text" name="texts" value="{{CMSHelper::settings('texts')}}">
            </div>
            <div class="form-group">
              <label>Override Texts</label>
              <input class="inputs" type="text" name="override_texts" value="{{CMSHelper::settings('override_texts')}}">
            </div>
            <div class="form-group">
              <label>Product Data</label>
              <input class="inputs" type="text" name="productdata" value="{{CMSHelper::settings('productdata')}}">
            </div>
            <div class="form-group">
              <label>Furnidata</label>
              <input class="inputs" type="text" name="furnidata" value="{{CMSHelper::settings('furnidata')}}">
            </div>
            <div class="form-group">
              <label>Figure Map</label>
              <input class="inputs" type="text" name="figuremap" value="{{CMSHelper::settings('figuremap')}}">
            </div>
            <div class="form-group">
              <label>Figure Data</label>
              <input class="inputs" type="text" name="figuredata" value="{{CMSHelper::settings('figuredata')}}">
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
