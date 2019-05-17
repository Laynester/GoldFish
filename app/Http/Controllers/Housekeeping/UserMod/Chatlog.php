<?php
namespace App\Http\Controllers\Housekeeping\UserMod;

use Auth;
use Request;
use App\Http\Controllers\Controller;
use App\Helpers\CMS;
use App\Models\Hotel\Chatlog as Chats;

class Chatlog extends Controller
{
  public function List()
  {
    if(auth()->user()->rank >= CMS::fuseRights('site_alert')){
      $chatlog = Chats::orderBy('timestamp', 'DESC')->paginate(30);
      return view('usermod.chatlog_list',
      [
        'group' => 'user',
        'chatlog' => $chatlog,
      ]);
    }
    else {
      return redirect('dashboard');
    }
  }
}
