<div class="body_content">
  <div class="box_4">
    <div class="heading">@yield('title')</div>
    <form method="post">
      <div class="content">
        <div class="row justify-content-center">
          <div class="col-md-6">
            <div class="form-group">
              <label for="username">Username</label>
              <input id="username" placeholder="Username" type="text" name="username">
            </div>
          </div>
        </div>
      </div>
      <div class="end">
        <div class="center">
          <button type="submit">Create</button>
        </div>
      </div>
      @csrf
    </form>
  </div>
</div>
