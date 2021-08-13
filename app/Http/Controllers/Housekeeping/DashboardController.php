<?php

namespace App\Http\Controllers\Housekeeping;

use App\Http\Controllers\Controller;
use App\Helpers\CMS;
use App\Models\CMS\Settings;
use Request;

class DashboardController extends Controller
{
  public function index()
  {
    if (CMS::fuseRights('dashboard')) {
      if (Request::isMethod('post')) {
        Settings::where('key', 'hk_notes')->update(['value' => request()->get('notes')]);
      }
      return view('dashboard', [
          'group' => 'dashboard'
        ]
      );
    } else {
      return redirect('me');
    }
  }
  public function credits()
  {
    if (CMS::fuseRights('dashboard')) {
      return view('credits', [
          'group' => 'credits'
        ]
      );
    } else {
      return redirect('me');
    }
  }
}
