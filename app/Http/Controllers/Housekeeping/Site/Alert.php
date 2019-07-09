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
    if(auth()->user()->rank >= CMS::fuseRights('site_alert')){
      if (Request::isMethod('post'))
      {
        Settings::where('key', 'site_alert_enabled')->update(['value' => request()->get('enabled')]);
        Settings::where('key', 'site_alert_badge')->update(['value' => request()->get('badge')]);
        Settings::where('key', 'site_alert')->update(['value' => request()->get('alert')]);
        return redirect()->back()->withErrors(['Saved changes.']);
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
