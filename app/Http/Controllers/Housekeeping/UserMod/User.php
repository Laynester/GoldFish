<?php
namespace App\Http\Controllers\Housekeeping\UserMod;

use Auth;
use Request;
use App\Http\Controllers\Controller;
use App\Helpers\CMS;
use App\Models\User\User as Users;

class User extends Controller
{
  public function render($user = null, Request $request)
  {
    if(auth()->user()->rank >= CMS::fuseRights('site_alert')){
      if (Request::isMethod('post'))
      {
        $userdata = Users::where('username', 'LIKE', Request::input('username'))->first();

        if(!empty($userdata)){
          return redirect('housekeeping/moderation/lookup/user/' . $userdata->username);
        }
        else {
          return redirect('housekeeping/moderation/lookup/user/');
        }
      }
      if(empty($user)) {
        return view('lookup.user',
        [
          'group' => 'user',
        ]);
      }
    }
    else {
      return redirect('dashboard');
    }
  }
}
