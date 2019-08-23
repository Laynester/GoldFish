<div class="body_content">
    <div class="box_4">
        <div class="heading">@yield('title')</div>
        <table class="full normal">
            <thead>
              <th style="width:33%">User</th>
              <th style="width:33%">Action</th>
              <th style="width:33%;">When</th>
            </thead>
            @foreach($logs as $row)
            <tr>
              <td>
                  <b><a href="{{ route('home', [$row->habbo->username]) }}">{{$row->habbo->username}}</a></b>
                  <small>({{$row->ip}})</small>
              </td>
              <td>{{$row->action}}</td>
              <td>{{ date('d/m/y h:ia',$row->timestamp) }}</td>
            </tr>
            @endforeach
        </table>
        <div class="end">
            {{ $logs->links() }}
        </div>
    </div>
</div>