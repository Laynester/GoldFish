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
          <div class="col-md-5">
            <div class="form-group">
               <label for="title">Discord Widget ID</label>
               <input type="text" value="{{CMSHelper::settings('discord_id')}}" name="discord_id"/>
             </div>
             <div class="form-group">
               <label for="title">Twitter Handle</label>
               <input type="text" value="{{CMSHelper::settings('twitter_handle')}}" name="twitter_handle"/>
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
