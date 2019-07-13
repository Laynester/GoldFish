<?php
namespace App\Http\Controllers\Housekeeping\Site;

use Auth;
use Request;
use App\Http\Controllers\Controller;
use App\Helpers\CMS;
use App\Models\CMS\Settings;

class Settings2 extends Controller
{
  public function render()
  {
    if(CMS::fuseRights('site_settings_social')){
      if (Request::isMethod('post'))
      {
        Settings::where('key', 'discord_id')->update(['value' => request()->get('discord_id')]);
        Settings::where('key', 'twitter_handle')->update(['value' => request()->get('twitter_handle')]);
        return view('site.settings2',
        [
          'group' => 'site',
        ])->withErrors(['Saved changes.']);
      }
      return view('site.settings2',
      [
        'group' => 'site',
      ]);
    }
    else {
      return redirect('housekeeping/dashboard');
    }
  }
}
