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
             <div class="form-group">
                <label for="title">Site Maintenance</label>
                <select name="maintenance">
                  <option @if(CMSHelper::settings('maintenance') == 1) selected @endif value="1">True</option>
                  <option @if(CMSHelper::settings('maintenance') == 0) selected @endif value="0">False</option>
                </select>
             </div>
             <div class="form-group">
                <label for="title">Maintenance Minimum Rank</label>
                <select name="maintenance_rank">
                    @foreach($permissions as $row)
                    <option value="{{$row->id}}" @if(CMSHelper::settings('maintenance_rank') == $row->id) selected @endif>{{$row->rank_name}}</option>
                    @endforeach
                  <select>
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
  <div class="box_4">
    <div class="heading">@yield('title')</div>
    <div class="content">
      <div class="row justify-content-center">
          <div class="col-md-12">
            <div class="form-group text-center">
              <label>Current cache variable: {{CMSHelper::settings('cacheVar')}}</label>
              <button class="full" onclick="window.location.href='/housekeeping/site/settings1?cache'">Clear Cache</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
