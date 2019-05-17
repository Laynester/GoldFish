<div class="body_content">
  <div class="box_4">
    <div class="heading">@yield('title')<a class="right" href="{{ route('hk_createnews') }}">Search For a Room</a></div>
    <div class="content">
      <table class="full normal">
        <thead>
          <th>User</th>
          <th>Message</th>
          <th>Date</th>
        </thead>
        @foreach ($chatlog as $chat)
        <tr>
          <td style="width:25%;">{{$chat->habbo->username}}</td>
          <td style="width:45%;">{{$chat->message}}</td>
          <td style="width:25%;">{{date('F d, Y', $chat->timestamp)}}</td>
        </tr>
        @endforeach
      </table>
      {{ $chatlog->links() }}
    </div>
  </div>
</div>
