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
        'hotelview' => request()->get('hotelview'),
        'profile_background' => request()->get('background')
      ]);
      return redirect('me');
    }

      $pbg = \File::allFiles(public_path('images/profile_backgrounds'));
      $hview = \File::allFiles(public_path('goldfish/images/me/views'));
      return view('pages.me.settings.hotel',
      [
        'group' => 'me',
        'pbg' => $pbg,
        'hview' => $hview
      ]);
  }
  public function account()
  {
    if (Request::isMethod('post'))
    {
      User::where('id', Auth()->User()->id)->update([
        'hotelview' => request()->get('hotelview')
      ]);
      return redirect('me');
    }
      return view('pages.me.settings.account',
      [
        'group' => 'me'
      ]);
  }
}
