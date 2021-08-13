<?php

namespace App\Http\Controllers\Housekeeping\UserMod;

use Request;
use Illuminate\Http\Request as Req;
use App\Http\Controllers\Controller;
use App\Helpers\CMS;
use App\Helpers\Rcon;


class BadgesController extends Controller
{
  public function __invoke(Req $request)
  {
    if (CMS::fuseRights('moderation_badges')) {
      if (Request::isMethod('post')) {
        $validatedData = $request->validate([
          'code'     => 'required',
          'username' => 'required'
        ]);
        $id   = CMS::userData(request()->get('username'), 'id');
        $code = request()->get('code');
        Rcon::giveBadge($id, $code);
        \App\Models\CMS\Hk::create([
          'user_id' => auth()->user()->id,
          'ip' => request()->ip(),
          'action' => 'Gave '.request()->get('username'). ' badge ('.request()->get('code').')',
          'timestamp' => time()
        ]);
        return redirect()->back()->withSuccess('Sent Badge');
      }
      return view('usermod.badges', [
          'group' => 'user'
        ]
      );
    } else {
      return redirect('housekeeping/dashboard');
    }
  }
}
