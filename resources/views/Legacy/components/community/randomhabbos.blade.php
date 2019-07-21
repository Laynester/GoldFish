<div class="legacy-box habbos">
  <div class="heading">Random {{CMSHelper::settings('hotelname')}}</div>
  <div class="content habbogrid">
    @foreach(\App\Models\user\User::inRandomOrder()->take(8)->get() as $habbo)
    <span onclick="window.location.href='{{ route('home', [$habbo->username]) }}'" class="ahabbo" onmouseover="openMouth('#habbo{{$habbo->id}}')" onmouseout="closeMouth('#habbo{{$habbo->id}}')">
      <div class="legacy-tooltip">
        <span>{{$habbo->username}}</span>
        <span>{{$habbo->motto}}</span>
      </div>
      <img id="habbo{{$habbo->id}}" src="{{CMSHelper::settings('habbo_imager')}}{{$habbo->look}}?direction=4"/>
    </span>
    @endforeach
  </div>
</div>
<script>
var interval = null;
function openMouth(img) {
  var old = $(img).attr('src');
  $(img).attr('src',old+'&action=wav&head_direction=3&gesture=sml&frame=1');
  interval = setInterval(function(){
    var str = $(img).attr('src');
    if(str.includes("&frame=1")) {
      $(img).attr('src',old+'&action=wav&head_direction=3&gesture=sml&frame=2');
    } else if(str.includes("&frame=2")) {
      $(img).attr('src',old+'&action=wav&head_direction=3&gesture=sml&frame=1');
    }
  }, 240);
}
function closeMouth(img) {
  var old = $(img).attr('src');
  var res = old.replace("&action=wav&head_direction=3&gesture=sml", "");
  if(old.includes("&frame=1")) {
    res = old.replace("&action=wav&head_direction=3&gesture=sml&frame=1", "");
  } else {
    res = old.replace("&action=wav&head_direction=3&gesture=sml&frame=2", "");
  }
  $(img).attr('src',res);
  clearInterval(interval);
}
</script>
