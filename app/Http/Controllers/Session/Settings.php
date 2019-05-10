<?php
namespace App\Http\Controllers\Session;

use Auth;
use Request;
use App\Http\Controllers\Controller;
use App\Models\User\User;

class Settings extends Controller
{
  public function __construct()
  {
      $this->middleware('auth');
  }
  public function render()
  {
    if (Request::isMethod('post'))
    {
      User::where('id', Auth()->User()->id)->update([
        'hotelview' => request()->get('hotelview')
      ]);
      return redirect('me');
    }
      return view('pages.me.settings.hotel',
      [
        'group' => 'me'
      ]);
  }
}
