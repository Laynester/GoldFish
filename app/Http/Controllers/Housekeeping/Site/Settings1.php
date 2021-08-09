<?php

namespace App\Http\Controllers\Housekeeping\Site;

use Request;
use App\Http\Controllers\Controller;
use App\Helpers\CMS;
use App\Models\CMS\Settings;
use App\Models\User\Permissions;

class Settings1 extends Controller
{
  public function index()
  {
    if (CMS::fuseRights('site_settings_general')) {
      if (isset($_GET['cache'])) {
        Settings::where('key', 'cacheVar')->update(['value' => sha1(time())]);
      }
      if (Request::isMethod('post')) {
        Settings::where('key', 'hotelname')->update(['value' => request()->get('hotelname')]);
        Settings::where('key', 'site_logo')->update(['value' => request()->get('logo')]);
        Settings::where('key', 'habbo_imager')->update(['value' => request()->get('imager')]);
        Settings::where('key', 'c_images')->update(['value' => request()->get('c_images')]);
        Settings::where('key', 'default_motto')->update(['value' => request()->get('motto')]);
        Settings::where('key', 'group_badges')->update(['value' => request()->get('groupbadges')]);
        Settings::where('key', 'findretros')->update(['value' => request()->get('findretros')]);
        Settings::where('key', 'theme')->update(['value' => request()->get('theme')]);
        Settings::where('key', 'maintenance')->update(['value' => request()->get('maintenance')]);
        Settings::where('key', 'maintenance_rank')->update(['value' => request()->get('maintenance_rank')]);
        Settings::where('key', 'goldfish_cards')->update(['value' => request()->get('gf_cards')]);
        \App\Models\CMS\Hk::create([
          'user_id' => auth()->user()->id,
          'ip' => request()->ip(),
          'action' => 'Made changes to the CMS Settings',
          'timestamp' => time()
        ]);
        return redirect()->back()->withErrors(['Saved changes.']);
      }
      $permissions = Permissions::get();
      return view('site.settings1', [
          'group'       => 'site',
          'permissions' => $permissions
        ]
      );
    } else {
      return redirect('housekeeping/dashboard');
    }
  }
}
