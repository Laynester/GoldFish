<?php

namespace App\Http\Controllers\Housekeeping\Site;

use Request;
use App\Http\Controllers\Controller;
use App\Helpers\CMS;
use App\Models\CMS\Settings;

class Settings2Controller extends Controller
{
  public function __invoke()
  {
    if (CMS::fuseRights('site_settings_social')) {
      if (Request::isMethod('post')) {
        Settings::where('key', 'discord_id')->update(['value' => request()->get('discord_id')]);
        Settings::where('key', 'twitter_handle')->update(['value' => request()->get('twitter_handle')]);
        \App\Models\CMS\Hk::create([
          'user_id' => auth()->user()->id,
          'ip' => request()->ip(),
          'action' => 'Made changes to the CMS Social Settings',
          'timestamp' => time()
        ]);
        return view('site.settings2', [
          'group' => 'site',
        ])->withErrors(['Saved changes.']);
      }
      return view('site.settings2', [
          'group' => 'site',
        ]
      );
    } else {
      return redirect('housekeeping/dashboard');
    }
  }
}
