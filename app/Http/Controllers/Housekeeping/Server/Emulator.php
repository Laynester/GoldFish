<?php
namespace App\Http\Controllers\Housekeeping\Server;

use Request;
use Illuminate\Http\Request as Req;
use App\Http\Controllers\Controller;
use App\Helpers\CMS;
use App\Helpers\Rcon;
use App\Models\Hotel\EmuSettings;

class Emulator extends Controller
{
  public function render(Req $request)
  {
    if(CMS::fuseRights('server_emulator')){
      if (Request::isMethod('post'))
      {
        $key = request()->get('key');
        foreach($key as $row) {
          EmuSettings::where('key', $row['name'])->update(['value' => $row['value']]);
        }
        return redirect()->back()->withSuccess('Saved settings!');
      }
      $form = EmuSettings::all();

      return view('server.emulator',
      [
        'group' => 'server',
        'form' => $form
      ]);
    }
    else {
      return redirect('housekeeping/dashboard');
    }
  }
}
