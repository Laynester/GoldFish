<?php
namespace App\Http\Controllers\Housekeeping\Site;

use Auth;
use Request;
use App\Http\Controllers\Controller;
use App\Helpers\CMS;
use App\Models\CMS\Settings;

class Settings1 extends Controller
{
  public function render()
  {
    if(auth()->user()->rank >= CMS::fuseRights('site_settings_general')){
      if (Request::isMethod('post'))
      {
        Settings::where('key', 'hotelname')->update(['value' => request()->get('hotelname')]);
        Settings::where('key', 'site_logo')->update(['value' => request()->get('logo')]);
        Settings::where('key', 'habbo_imager')->update(['value' => request()->get('imager')]);
        Settings::where('key', 'c_images')->update(['value' => request()->get('c_images')]);
        Settings::where('key', 'default_motto')->update(['value' => request()->get('motto')]);
        return view('site.settings1',
        [
          'group' => 'site',
        ])->withErrors(['Saved changes.']);
      }
      return view('site.settings1',
      [
        'group' => 'site',
      ]);
    }
    else {
      return redirect('dashboard');
    }
  }
}
