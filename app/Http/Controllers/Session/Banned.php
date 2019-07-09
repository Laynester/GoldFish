<?php
namespace App\Http\Controllers\Session;

use Auth;
use App\Http\Controllers\Controller;
use App\Models\User\Bans;

class Banned extends Controller
{
  public function __construct()
  {
      $this->middleware('auth');
  }
  public function render()
  {
      $ban = Bans::where('user_id', Auth()->User()->id)->orWhere('ip',Auth()->User()->ip_current)->orderBy('id','desc')->first();
      return view('pages.banned',
      [
        'group' => 'me',
        'ban' => $ban
      ]);
  }
}
