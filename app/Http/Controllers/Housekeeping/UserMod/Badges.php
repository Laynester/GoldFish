<?php
namespace App\Http\Controllers\Housekeeping\UserMod;

use Auth;
use Request;
use Illuminate\Http\Request as Req;
use App\Http\Controllers\Controller;
use App\Helpers\CMS;
use Redirect;
use App\Helpers\Rcon;
use App\Models\User\User_Badges;


class Badges extends Controller
{
  public function render(Req $request)
  {
    if(auth()->user()->rank >= CMS::fuseRights('moderation_badges')){
      if (Request::isMethod('post'))
      {
        $validatedData = $request->validate([
          'code'   => 'required',
          'username' => 'required'
        ]);
        $id = CMS::userData(request()->get('username'),'id');
        $code = request()->get('code');
        Rcon::giveBadge($id,$code);
        return redirect()->back()->withSuccess('Sent Badge');
      }
      return view('usermod.badges',
      [
        'group' => 'user'
      ]);
    }
    else {
      return redirect('housekeeping/dashboard');
    }
  }
}
