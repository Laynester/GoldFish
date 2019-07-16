<?php
namespace App\Http\Controllers\Housekeeping;

use App\Http\Controllers\Controller;
use App\Helpers\CMS;
use App\Models\CMS\Settings;
use Request;

class Dashboard extends Controller
{
  public function render()
  {
    if(CMS::fuseRights('dashboard')){
      if (Request::isMethod('post'))
      {
        Settings::where('key', 'hk_notes')->update(['value' => request()->get('notes')]);
      }
      return view('dashboard',
      [
        'group' => 'dashboard'
      ]);
    }
    else {
      return redirect('me');
    }
  }
}
