<div class="box">
  <div class="heading">Random {{CMSHelper::settings('hotelname')}}'s</div>
  <div class="content">
    @foreach($users as $habbo)
      <img src="{{CMSHelper::settings('habbo_imager')}}{{$habbo->look}}"/>
    @endforeach
  </div>
</div>
