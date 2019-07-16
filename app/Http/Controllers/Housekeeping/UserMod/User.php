<?php
namespace App\Http\Controllers\Housekeeping\UserMod;

use Auth;
use Request;
use Illuminate\Http\Request as Req;
use Input;
use App\Http\Controllers\Controller;
use App\Helpers\CMS;
use App\Models\User\User as Users;
use Redirect;
use App\Models\Hotel\Chatlog;
use Carbon\Carbon;


class User extends Controller
{
  public function render($user = null, Req $request)
  {
    if(CMS::fuseRights('moderation_user')){
      if (Request::isMethod('post'))
      {
        if (request()->has('edit')) {
          Users::where('username', $user)->update(['motto' => request()->get('motto')]);
          if(CMS::fuseRights('moderation_user_admin')){
            Users::where('username', $user)->update([
              'rank' => request()->get('rank'),
              'credits' => request()->get('coins')
            ]);
          }
          $request->session()->flash('message', "User Saved!");
          return redirect()->back();
        }
        $userdata = Users::where('username', 'LIKE', Request::input('username'))->first();

        if(!empty($userdata)){
          return redirect('housekeeping/moderation/lookup/user/' . $userdata->username);
        }
        else {
          return redirect('housekeeping/moderation/lookup/user/');
        }
      }
      if(empty($user)) {
        $users = Users::orderBy('id','DESC')->paginate(15);
        return view('lookup.user',
        [
          'group' => 'user',
          'users' => $users
        ]);
      }
      else {
        $userdata = Users::where('username', 'LIKE', $user)->first();
        $alt = Users::where('ip_register' , $userdata->ip_register)->get();
        $chats = Chatlog::where('user_from_id', $userdata->id)->orderBy('timestamp','DESC')->paginate(25);
        return view('lookup.user',
        [
          'group' => 'user',
          'user' => $userdata,
          'alt' => $alt,
          'chats' => $chats
        ]);
      }
    }
    else {
      return redirect('housekeeping/dashboard');
    }
  }
  public function online()
  {
    $users = Users::orderBy('id','DESC')->where('online', '1')->paginate(15);
    return view('usermod.online',
    [
      'group' => 'user',
      'users' => $users
    ]);
  }
}
