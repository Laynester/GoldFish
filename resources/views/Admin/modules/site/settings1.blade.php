<div class="body_content">
  <div class="box_4">
    <div class="heading">@yield('title')</div>
    <form method="post">
      <div class="content">
        <div class="row justify-content-center">
          <div class="col-md-5">
            <div class="form-group">
               <label for="title">Hotel Name</label>
               <input type="text" placeholder="Hotel Name" value="{{CMSHelper::settings('hotelname')}}" name="hotelname"/>
             </div>
             <div class="form-group">
               <label for="title">Hotel Logo</label>
               <input type="text" placeholder="Hotel Logo" value="{{CMSHelper::settings('site_logo')}}" name="logo"/>
             </div>
             <div class="form-group">
               <label for="title">Habbo Imager</label>
               <input type="text" placeholder="Alert" value="{{CMSHelper::settings('habbo_imager')}}" name="imager"/>
             </div>
             <div class="form-group">
               <label for="title">Client Images</label>
               <input type="text" placeholder="C_images" value="{{CMSHelper::settings('c_images')}}" name="c_images"/>
             </div>
             <div class="form-group">
               <label for="title">Default Motto</label>
               <input type="text" placeholder="Motto" value="{{CMSHelper::settings('default_motto')}}" name="motto"/>
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
