@extends('layout.master')
@section('content')
@section('step', '2')
<div class="col-lg-6">
  <div class="box grey">
    <p>This is your website configuration, this can later be changed through the databse, or through your hotel housekeeping!</p>
    <p>WARNING: You must have an existing SWF Directory, otherwise your hotel will not function properly.</p>
  </div>
  <div class="habblet" id="habblet" style="display:none;">
  </div>
</div>
<div class="col-lg-6">
  @if($errors->any())
  <div class="box red">
    {{$errors->first()}}
  </div>
  @endif
  <form method="post">
    <div class="box">
      <h2>CMS Config</h2>
      <div class="form-group">
         <label for="title">Hotel Name:</label>
         <input class="inputs"type="text" placeholder="Hotel Name" value="{{CMSHelper::settings('hotelname')}}" name="hotelname"/>
       </div>
       <div class="form-group">
         <label for="title">Hotel Logo:</label>
         <input class="inputs"type="text" placeholder="Hotel Logo" value="{{CMSHelper::settings('site_logo')}}" name="logo"/>
       </div>
       <div class="form-group">
         <label for="title">Habbo Imager:</label>
         <input class="inputs"type="text" placeholder="Alert" value="{{CMSHelper::settings('habbo_imager')}}" name="imager"/>
       </div>
       <div class="form-group">
         <label for="title">Default Motto:</label>
         <input class="inputs"type="text" placeholder="Motto" value="{{CMSHelper::settings('default_motto')}}" name="motto"/>
       </div>
       <div class="form-group">
         <label for="title">Group Badge Location:</label>
         <input class="inputs"type="text" value="{{CMSHelper::settings('group_badges')}}" name="groupbadges"/>
       </div>
       <div class="form-group">
         <label for="title">Site Theme</label>
         <select name="theme" onkeypress="changePreview(this.value)" onchange="changePreview(this.value)">
           <option value="goldfish">Goldfish</option>
           <option value="legacy">Legacy</option>
         </select>
       </div>
    </div>
    <span class="controls">
      <button class="green" type="submit">Continue</button>
      <a class="red" href="/installer/index">Back</a>
    </span>
    @csrf
  </form>
</div>
<script>
function changePreview(input) {
  $('#habblet').css("background-image", "url('/install/"+input+"_preview.png')").css("display", "block");
}
</script>
@endsection
