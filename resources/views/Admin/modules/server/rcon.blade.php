<div class="body_content">
  <div class="box_4">
    <div class="heading">Update Menu</div>
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
        <div class="col-md-6">
          <button class="center full" onclick="window.location.href='/housekeeping/server/rcon/bots'">Update Bots</button>
          <button class="center full" onclick="window.location.href='/housekeeping/server/rcon/catalog'">Update Catalog</button>
          <button class="center full" onclick="window.location.href='/housekeeping/server/rcon/navigator'">Update Navigator</button>
          <button class="center full" onclick="window.location.href='/housekeeping/server/rcon/items'">Update Items</button>
          <button class="center full" onclick="window.location.href='/housekeeping/server/rcon/texts'">Update Texts</button>
          <button class="center full" onclick="window.location.href='/housekeeping/server/rcon/config'">Update Config</button>
          <button class="center full" onclick="window.location.href='/housekeeping/server/rcon/hotel_view'">Update Hotel View News</button>
          <button class="center full" onclick="window.location.href='/housekeeping/server/rcon/permissions'">Update Permissions</button>
          <button class="center full" onclick="window.location.href='/housekeeping/server/rcon/word_filter'">Update Word Filter</button>
          <button class="center full" onclick="window.location.href='/housekeeping/server/rcon/polls'">Update Polls</button>
        </div>
      </div>
    </div>
  </div>
  <div class="box_4">
    <div class="heading">Hotel Alert</div>
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
          <div class="col-md-7">
            <div class="form-group">
              <label>Message</label>
              <input type="text" name="message" placeholder="Message">
              <input type="text" name="link" placeholder="Link(optional)">
            </div>
          </div>
        </div>
      </div>
      <div class="end">
        <div class="center">
          <button type="submit">Send</button>
        </div>
      </div>
      @csrf
    </form>
  </div>
</div>
