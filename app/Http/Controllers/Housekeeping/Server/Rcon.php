<?php
namespace App\Http\Controllers\Housekeeping\Server;

use Auth;
use Request;
use Illuminate\Http\Request as Req;
use App\Http\Controllers\Controller;
use App\Helpers\CMS;
use App\Models\Hotel\Vouchers as Insert;
use App\Helpers\Rcon as DoRcon;

class Rcon extends Controller
{
  public function render($key = '', Req $request)
  {
    if(auth()->user()->rank >= CMS::fuseRights('server_rcon')){
      if(!empty($key)) {
        if(auth()->user()->online = '1') {
          DoRcon::execCommand(auth()->user()->id,':update_'.$key);
          return redirect()->back()->withSuccess('Updated '.$key);
        }
        return redirect()->back()->withErrors('You must be online!');
      }
      if (Request::isMethod('post'))
      {
        DoRcon::hotelAlert(request()->get('message'),request()->get('link'));
      }
      return view('server.rcon',
      [
        'group' => 'server',
      ]);
    }
    else {
      return redirect('housekeeping/dashboard');
    }
  }
}
