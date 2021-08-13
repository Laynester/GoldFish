<?php

namespace App\Http\Controllers\Housekeeping\UserMod;

use Request;
use Illuminate\Http\Request as Req;
use App\Http\Controllers\Controller;
use App\Helpers\CMS;
use App\Models\User\Bans as BanList;
use App\Helpers\Rcon;


class BansController extends Controller
{
  public function __invoke(Req $request)
  {
    if (CMS::fuseRights('moderation_banlist')) {
      if (Request::isMethod('post')) {
        $validatedData = $request->validate([
          'time'     => 'required',
          'username' => 'required',
          'reason'   => 'required'
        ]);
        $time     = request()->get('time');
        $reason   = request()->get('reason');
        $username = request()->get('username');
        if (auth()->user()->online == '1') {
          if ($time == 'super') {
            Rcon::execCommand(auth()->user()->id, ':superban ' . $username . ' ' . $reason);
          } else {
            Rcon::execCommand(auth()->user()->id, ':ban ' . $username . ' ' . $time . ' ' . $reason);
          }
        } else {
          if ($time == 'super') {
            $type = 'super';
            $time = 94608000 + time();
          } else {
            $type = 'account';
            $time = request()->get('time') + time();
          }
          BanList::create([
            'user_id'       => CMS::userData($username, 'id'),
            'ip'            => CMS::userData($username, 'ip_current'),
            'machine_id'    => CMS::userData($username, 'machine_id'),
            'user_staff_id' => auth()->user()->id,
            'timestamp'     => time(),
            'ban_expire'    => $time,
            'ban_reason'    => request()->get('reason'),
            'type'          => $type,
          ]);
          Rcon::disconnect(CMS::userData($username, 'id'));
        }
        \App\Models\CMS\Hk::create([
          'user_id' => auth()->user()->id,
          'ip' => request()->ip(),
          'action' => 'Banned '.$username.' for '. request()->get('reason'),
          'timestamp' => time()
        ]);
        return redirect()->back()->withSuccess('Banned ' . $username);
      }
      $bans = BanList::orderBy('timestamp', 'DESC')->paginate(30);
      return view('usermod.banlist', [
          'group' => 'user',
          'bans'  => $bans
        ]
      );
    } else {
      return redirect('housekeeping/dashboard');
    }
  }
}
