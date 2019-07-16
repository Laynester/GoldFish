<div class="body_content">
  <div class="box_4">
    <div class="heading">Online Users</div>
    @if($users->count() == 0)
    <div class="content text-center">
      <h3>No users online</h3>
    </div>
    @else
    <table class="full normal">
      <thead>
        <th style="width:5%">ID</th>
        <th style="width:20%">Name</th>
        <th style="width:25%">E-Mail</th>
        <th style="width:30%">Join Date</th>
        <th style="width:30%;">Latest Activity</th>
        <th style="width:5%;">Options</th>
      </thead>
      @foreach($users as $row)
      <tr>
        <td class="id">{{$row->id}}</td>
        <td>
          <b>{{$row->username}}</b>
          <small>({{$row->ip_current}})</small>
        </td>
        <td class="text-center">{{$row->mail}}</td>
        <td class="text-center">{{date('d/m/y h:ia',$row->account_created)}}</td>
        <td>{{date('d/m/y h:ia',$row->last_login)}}</td>
        <td><a href="/housekeeping/moderation/lookup/user/{{$row->username}}">View</a></td>
      </tr>
      @endforeach
    </table>
    <div class="end">
      {{ $users->links() }}
    </div>
    @endif
  </div>
</div>
