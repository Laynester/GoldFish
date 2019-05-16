<div class="body_content">
  <div class="box_4">
    <div class="heading">@yield('title')</div>
    <form method="post">
      <div class="content">
        @if($errors->any())
        <div class="alert alert-success" role="alert">
          {{$errors->first()}}
        </div>
        @endif
        <div class="row justify-content-center">
          <div class="col-md-3">
            <div class="form-group">
               <label for="title">Enable or Disable</label>
               <select name="enabled">
                 <option value="{{CMSHelper::settings('site_alert_enabled')}}">Enable/Disable</option>
                 <option value="1">Enable</option>
                 <option value="0">Disable</option>
               </select>
             </div>
             <div class="form-group">
               <label for="title">Badge</label>
               <input type="text" placeholder="Badge" value="{{CMSHelper::settings('site_alert_badge')}}" name="badge"/>
             </div>
             <div class="form-group">
               <label for="title">Alert Message</label>
               <input type="text" placeholder="Alert" value="{{CMSHelper::settings('site_alert')}}" name="alert"/>
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
