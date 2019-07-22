<?php
namespace App\Http\Controllers\Housekeeping\UserMod;

use Auth;
use Request;
use App\Http\Controllers\Controller;
use App\Helpers\CMS;
use App\Models\Hotel\Chatlog as Chats;

class Chatlog extends Controller
{
  public function List($id = '')
  {
    if(CMS::fuseRights('moderation_chatlog')){
      if (Request::isMethod('post'))
      {
        $room = \App\Models\Hotel\Room::where('name', 'LIKE', request()->get('room'))->pluck('id')->first();
        if(empty($room)) {
          return redirect()->back()->withErrors(['Room not found!']);
        }
        return redirect('housekeeping/moderation/chatlog/list/'.$room);
      }
      $chatlog = Chats::whereHas('room')->orderBy('timestamp', 'DESC')->paginate(30);
      if(!empty($id)) {
        $chatlog = Chats::where('room_id',$id)->orderBy('timestamp', 'DESC')->paginate(30);
      }
      return view('usermod.chatlog_list',
      [
        'group' => 'user',
        'chatlog' => $chatlog,
      ]);
    }
    else {
      return redirect('housekeeping/dashboard');
    }
  }
}
