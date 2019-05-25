<div class="body_content">
  <div class="box_4">
    <div class="heading">@yield('title')</div>
    @if(empty($user))
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
    @else
    <form method="post">
      <input hidden name="edit">
    <div class="content">
      @if (Session::has('message'))
      <div class="alert alert-success">{{ Session::get('message') }}</div>
      @endif
      <h4>{{$user->username}} <small>({{$user->rank_name->rank_name}})</small></h4>
      <table class="full normal">
        <tr>
          <td>ID:</td>
          <td><input disabled value="{{$user->id}}"></td>
        </tr>
        <tr>
          <td>Motto:</td>
          <td><input name="motto" value="{{$user->motto}}"></td>
        </tr>
        <tr>
          <td>Rank:</td>
          <td><input name="rank" @if (auth()->user()->rank < CMSHelper::fuseRights('moderation_user_admin')) disabled @endif value="{{$user->rank}}"></td>
        </tr>
        <tr>
          <td>Coins:</td>
          <td><input name="coins" @if (auth()->user()->rank < CMSHelper::fuseRights('moderation_user_admin')) disabled @endif value="{{$user->credits}}"></td>
        </tr>
        <tr>
          <td>IP Register:</td>
          <td><input disabled value="{{$user->ip_register}}"></td>
        </tr>
        <tr>
          <td>Last IP:</td>
          <td><input disabled value="{{$user->ip_current}}"></td>
        </tr>
        <tr>
          <td>Date Registered:</td>
          <td><input disabled value="{{date('d/m/y', $user->account_created)}}"></td>
        </tr>
        <tr>
          <td>Last Login</td>
          <td><input disabled value="{{date('d/m/y', $user->last_login)}}"></td>
        </tr>
      </table>
      <h4>Detected Alts</h4>
      @foreach($alt as $account)
      <b><a href="{{ route('hk_user_lookup', [$account->username]) }}"> {{$account->username}},</a></b>
      @endforeach
    </div>
    <div class="end">
      <div class="center">
        <button type="submit">Save</button>
      </div>
    </div>
    @csrf
  </form>
    @endif
</div>
@if(!empty($user))
<div class="box_4">
  <div class="heading">Recent Chats</div>
  <table class="full normal">
    <thead>
    <th style="width:25%">When</th>
    <th style="width:50%">Message</th>
    <th style="width:25%">Room</th>
  </thead>
  @foreach($chats as $chat)
  <tr>
    <td>{{date('d/m/y h:ia', $chat->timestamp)}}</td>
    <td>{{$chat->message}}</td>
    <td>{{$chat->room->name}}</td>
  </tr>
  @endforeach
  </table>
</div>
@endif
