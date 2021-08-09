<?php

namespace App\Http\Controllers\Housekeeping\Site;

use Request;
use App\Http\Controllers\Controller;
use App\Helpers\CMS;

class Alert extends Controller
{
  public function index()
  {
    if (CMS::fuseRights('site_alert')) {
      if (isset($_GET['delete'])) {
        \App\Models\CMS\Alerts::where('userid', Auth()->User()->id)->orWhere('id', $_GET['delete'])->delete();
        return redirect()->back()->withSuccess('Deleted Alert');
      }
      if (Request::isMethod('post')) {
        \App\Models\CMS\Alerts::Create([
          'message' => request()->get('message'),
          'icon'    => request()->get('icon'),
          'userid'  => request()->get('userid')
        ]);
        \App\Models\CMS\Hk::create([
          'user_id' => auth()->user()->id,
          'ip' => request()->ip(),
          'action' => 'Sent a site alert('.request()->get('message').')',
          'timestamp' => time()
        ]);
        return redirect()->back()->withSuccess('Sent alert');
      }
      return view('site.alert',[
          'group' => 'site',
        ]
      );
    } else {
      return redirect('housekeeping/dashboard');
    }
  }
}
