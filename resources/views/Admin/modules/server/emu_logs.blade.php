<div class="body_content">
    <div class="box_4">
        <div class="heading">@yield('title') - Commands</div>
        <table class="full normal text-center">
            <thead>
              <th style="width:25%">User</th>
              <th style="width:25%">Command</th>
              <th style="width:25%;">Params</th>
              <th style="width:25%;">When</th>
            </thead>
            @foreach($logs as $row)
            <tr>
              <td>{{ $row->habbo->username}}</td>
              <td>{{ $row->command}}</td>
              <td>{{ $row->params}}</td>
              <td>{{ date('d/m/y h:ia',$row->timestamp) }}</td>
            </tr>
            @endforeach
        </table>
        <div class="end">
            {{ $logs->links() }}
        </div>
    </div>
</div>