<?php
namespace App\Http\Controllers\Housekeeping\Site;

use Auth;
use Request;
use App\Http\Controllers\Controller;
use App\Helpers\CMS;
use App\Models\CMS\Settings;

class Alert extends Controller
{
  public function render()
  {
    if(CMS::fuseRights('site_alert')){
      if(isset($_GET['delete'])) {
        \App\Models\CMS\Alerts::where('userid', Auth()->User()->id)->orWhere('id',$_GET['delete'])->delete();
        return redirect()->back()->withSuccess('Deleted Alert');
      }
      if (Request::isMethod('post'))
      {
        \App\Models\CMS\Alerts::Create([
          'message' => request()->get('message'),
          'icon' => request()->get('icon'),
          'userid' => request()->get('userid')
        ]);
        return redirect()->back()->withSuccess('Sent alert');
      }
      return view('site.alert',
      [
        'group' => 'site',
      ]);
    }
    else {
      return redirect('housekeeping/dashboard');
    }
  }
}
