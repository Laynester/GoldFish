<?php
namespace App\Http\Controllers\Housekeeping;

use Auth;
use App\Http\Controllers\Controller;
use App\Helpers\CMS;

class Dashboard extends Controller
{
  public function __construct()
  {
      $this->middleware('auth');
      $this->middleware('setTheme:Admin');
  }
  public function render()
  {
    if(auth()->user()->rank >= CMS::fuseRights('dashboard')){
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
