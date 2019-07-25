<div class="body_content">
  <div class="box_4">
    <div class="heading">Give a Badge</div>
    <form method="post">
      <div class="content">
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
          <div class="col-md-3">
            <div class="form-group">
              <label>Badge Code</label>
              <input type="text" onkeyup="readURL(this)" placeholder="Badge Code" name="code">
            </div>
          </div>
          <div class="col-md-3">
            <div class="form-group">
              <label>Username</label>
              <input type="text" placeholder="Username" name="username">
            </div>
          </div>
          <div class="col-md-1">
            <div class="form-group text-center">
              <label>Badge</label>
              <img class="center" id="badge" src="{{CMSHelper::settings('c_images')}}album1584/ADM.gif">
            </div>
          </div>
        </div>
      </div>
      <div class="end">
        <div class="center">
          <button type="submit">Give</button>
        </div>
      </div>
      @csrf
    </form>
  </div>
</div>
