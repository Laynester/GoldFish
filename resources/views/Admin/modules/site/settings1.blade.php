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
          <div class="col-md-6">
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
             <div class="form-group">
               <label for="title">Group Badge Location</label>
               <input type="text" value="{{CMSHelper::settings('group_badges')}}" name="groupbadges"/>
             </div>
             <div class="form-group">
               <label for="title">FindRetros</label>
               <input type="text" placeholder="Account username" value="{{CMSHelper::settings('findretros')}}" name="findretros"/>
             </div>
             <div class="form-group">
               <label for="title">Site Theme</label>
               <select name="theme" onkeypress="changePreview(this.value)" onchange="changePreview(this.value)">
                 <option @if(CMSHelper::settings('theme') == 'goldfish') selected @endif value="goldfish">Goldfish</option>
                 <option @if(CMSHelper::settings('theme') == 'legacy') selected @endif value="legacy">Legacy</option>
               </select>
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
