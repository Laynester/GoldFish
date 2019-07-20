<div class="legacy-box">
  <div class="heading">My Online Friends</div>
  <div class="content settings">
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
      <form method="post">
        <div class="form-group">
        <label for="hotelview">Me page Hotel View</label></br>
          <div class="options hotelview">
            @foreach ($hview as $view)
              <input type="radio" id="{{$view->getFilename()}}" name="hotelview" @if(Auth()->User()->hotelview == $view->getFilename()) checked @endif value="{{$view->getFilename()}}"/>
              <label for="{{$view->getFilename()}}" style="background-image:url(/goldfish/images/me/views/{{$view->getFilename()}});"></label>
            @endforeach
          </div>
          <label for="hotelview">Profile Background</label>
          <div class="options hotelview">
            @foreach ($pbg as $bg)
              <input type="radio" id="{{$bg->getFilename()}}" name="background" @if(Auth()->User()->profile_background == $bg->getFilename()) checked @endif value="{{$bg->getFilename()}}"/>
              <label for="{{$bg->getFilename()}}" style="background-image:url(/images/profile_backgrounds/{{$bg->getFilename()}});"></label>
            @endforeach
          </div>
        </div>
        <button type="submit" name="submit">Save Settings</button>
        @csrf
      </form>
    </div>
  </div>
</div>
