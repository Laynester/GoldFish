<?php

namespace App\Http\Controllers\Housekeeping\UserMod;

use Request;
use App\Http\Controllers\Controller;
use App\Helpers\CMS;
use App\Models\Hotel\Chatlog as Chats;

class Chatlog extends Controller
{
  public function List()
  {
    if (CMS::fuseRights('moderation_chatlog')) {
      if (Request::isMethod('post')) {
        if(!empty(request()->get('room'))) {
          $room = \App\Models\Hotel\Room::where('id', request()->get('room'))->pluck('id')->first();
          if (empty($room)) {
            return redirect()->back()->withErrors('Room not found!');
          }
          return redirect('housekeeping/moderation/chatlog/list/room/' . $room);
        } else {
          $user = \App\Models\User\User::where('username', request()->get('user'))->pluck('id')->first();
          if (empty($user)) {
            return redirect()->back()->withErrors('User not found!');
          }
          return redirect('housekeeping/moderation/chatlog/list/user/' . $user);
        }
      }
      $chatlog = Chats::whereHas('room')->orderBy('timestamp', 'DESC')->paginate(30);
      return view('usermod.chatlog_list', [
          'group'   => 'user',
          'chatlog' => $chatlog,
        ]
      );
    } else {
      return redirect('housekeeping/dashboard');
    }
  }
  public function room($id = '')
  {
    if (CMS::fuseRights('moderation_chatlog')) {
      $chatlog = Chats::where('room_id', $id)->whereHas('room')->orderBy('timestamp', 'DESC')->paginate(30);
      return view('usermod.chatlog_list', [
          'group'   => 'user',
          'chatlog' => $chatlog,
        ]
      );
    } else {
      return redirect('housekeeping/dashboard');
    }
  }
  public function user($id = '')
  {
    if (CMS::fuseRights('moderation_chatlog')) {
      $chatlog = Chats::where('user_from_id', $id)->whereHas('room')->orderBy('timestamp', 'DESC')->paginate(30);
      return view('usermod.chatlog_list', [
          'group'   => 'user',
          'chatlog' => $chatlog,
        ]
      );
    } else {
      return redirect('housekeeping/dashboard');
    }
  }
}
