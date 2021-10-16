<div class="legacy-box habbos">
  <div class="heading">Random Online {{CMSHelper::settings('hotelname')}}</div>
  @if(\App\Models\user\User::where('online','1')->first() <> null)
  <div class="content habbogrid">
    @foreach(\App\Models\user\User::where('online','1')->inRandomOrder()->take(8)->get() as $habbo)
    <span onclick="window.location.href='{{ route('profile.show', [$habbo->username]) }}'" class="ahabbo" onmouseover="openMouth('#habboid{{$habbo->id}}')" onmouseout="closeMouth('#habboid{{$habbo->id}}')">
      <div class="legacy-tooltip">
        <span>{{$habbo->username}}</span>
        <span>{{$habbo->motto}}</span>
      </div>
      <img id="habboid{{$habbo->id}}" src="{{CMSHelper::settings('habbo_imager')}}{{$habbo->look}}?direction=4"/>
    </span>
    @endforeach
  </div>
  @else
  <h6 class="text-center">No users are online</h6>
  @endif
</div>
