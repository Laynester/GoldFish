<?php
namespace App\Http\Controllers\Housekeeping\Server;

use Auth;
use Request;
use Illuminate\Http\Request as Req;
use App\Http\Controllers\Controller;
use App\Helpers\CMS;
use App\Models\CMS\Settings;
use App\Models\Hotel\Navigator_Pubcat;
use App\Models\Hotel\Navigator_Publics;
use App\Models\Hotel\Room;
use App\Helpers\Rcon;

class Emulator extends Controller
{
  public function render(Req $request)
  {
    if(auth()->user()->rank >= CMS::fuseRights('server_emulator')){
      if (Request::isMethod('post'))
      {
        $validatedData = $request->validate([
          'emuhost'   => 'required',
          'emuport' => 'required',
          'rconip' => 'required',
          'rconport' => 'required'
        ]);
        Settings::where('key', 'emuhost')->update(['value' => request()->get('emuhost')]);
        Settings::where('key', 'emuport')->update(['value' => request()->get('emuport')]);
        Settings::where('key', 'rconip')->update(['value' => request()->get('rconip')]);
        Settings::where('key', 'rconport')->update(['value' => request()->get('rconport')]);
        return redirect()->back()->withSuccess('Saved settings!');
      }
      return view('server.emulator',
      [
        'group' => 'server',
      ]);
    }
    else {
      return redirect('housekeeping/dashboard');
    }
  }
}
