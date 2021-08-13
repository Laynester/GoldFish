<?php
namespace App\Http\Controllers\Housekeeping\Server;

use App\Http\Controllers\Controller;
use App\Helpers\CMS;

class LogsController extends Controller
{
  public function __invoke($type)
  {
    if(CMS::fuseRights('server_logging')){
        switch ($type) {
            case "hk":
            $logs = \App\Models\CMS\Hk::paginate(30);
            $type= 'hk';
                break;
            case "commands":
            $logs = \App\Models\Hotel\Commands::paginate(30);
            $type= 'commands';
                break;
        }
        return view('server.logs', [
            'group' => 'server',
            'type' => $type,
            'logs' => $logs
        ]);
    } else {
        return redirect('housekeeping/dashboard');
    }
  }
}
