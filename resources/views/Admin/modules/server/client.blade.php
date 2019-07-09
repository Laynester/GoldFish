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
              <label>SWF Directory</label>
              <input type="text" name="swfdir" value="{{CMSHelper::settings('swfdir')}}">
            </div>
            <div class="form-group">
              <label>SWF</label>
              <input type="text" name="swf" value="{{CMSHelper::settings('swf')}}">
            </div>
            <div class="form-group">
              <label>Variables</label>
              <input type="text" name="variables" value="{{CMSHelper::settings('variables')}}">
            </div>
            <div class="form-group">
              <label>Override Variables</label>
              <input type="text" name="override_variables" value="{{CMSHelper::settings('override_variables')}}">
            </div>
            <div class="form-group">
              <label>Texts</label>
              <input type="text" name="texts" value="{{CMSHelper::settings('texts')}}">
            </div>
            <div class="form-group">
              <label>Override Texts</label>
              <input type="text" name="override_texts" value="{{CMSHelper::settings('override_texts')}}">
            </div>
            <div class="form-group">
              <label>Product Data</label>
              <input type="text" name="productdata" value="{{CMSHelper::settings('productdata')}}">
            </div>
            <div class="form-group">
              <label>Furnidata</label>
              <input type="text" name="furnidata" value="{{CMSHelper::settings('furnidata')}}">
            </div>
            <div class="form-group">
              <label>Figure Map</label>
              <input type="text" name="figuremap" value="{{CMSHelper::settings('figuremap')}}">
            </div>
            <div class="form-group">
              <label>Figure Data</label>
              <input type="text" name="figuredata" value="{{CMSHelper::settings('figuredata')}}">
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
