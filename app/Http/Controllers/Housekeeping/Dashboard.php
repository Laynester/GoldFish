<?php
namespace App\Http\Controllers\Housekeeping;

use App\Http\Controllers\Controller;
use App\Helpers\CMS;

class Dashboard extends Controller
{
  public function render()
  {
    if(CMS::fuseRights('dashboard')){
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
