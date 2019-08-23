<?php

namespace App\Http\Controllers\Session;

use App\Http\Controllers\Controller;
use App\Models\User\User;
use App\Models\CMS\Camera_web;
use App\Models\Hotel\GroupMembership;
use App\Models\CMS\Homes;
use Request;
use App\Helpers\CMS;

class Home extends Controller
{
  public function showProfile($username)
  {
    $user = User::where('username', $username)->first();
    if (empty($user)) {
      return redirect()->back();
    }
    $edit = false;
    if(\Request::is('home/'.$user->username.'/edit')) {
      if($user->id == auth()->user()->id) {
        $edit = true;
      } else {
        return redirect('/home/'.$user->username);
      }
    }
    $widgets = Homes::where('user_id', $user->id)->get();
    if($widgets->isEmpty()) {
      $data = array(
        array('user_id' => $user->id,'type' => 'b','name' => 'bg_pattern_abstract2.gif','z' => 0,'x' => 0,'y' => 0,'skin' => '','visible'=> 1,'data' => null),
        array('user_id' => $user->id,'type' => 'w','name' => 'myhabbo','z' => 0,'x' => 455,'y' => 27,'skin' => 'default_skin','visible'=> 1,'data' => null),
        array('user_id' => $user->id,'type' => 'w','name' => 'rooms','z' => 0,'x' => 490,'y' => 245,'skin' => 'default_skin','visible' => 1,'data' => null),
        array('user_id' => $user->id,'type' => 'w','name' => 'mybadges','z' => 0,'x' => 0,'y' => 0,'skin' => 'golden_skin','visible' => 0,'data' => null),
        array('user_id' => $user->id,'type' => 'w','name' => 'friends','z' => 0,'x' => 0,'y' => 0,'skin' => 'notepad_skin','visible' => 0,'data' => null),
        array('user_id' => $user->id,'type' => 'w','name' => 'groups','z' => 0,'x' => 0,'y' => 0,'skin' => 'golden_skin','visible' => 0,'data' => null),
        array('user_id' => $user->id,'type' => 'w','name' => 'photo','z' => 0,'x' => 0,'y' => 0,'skin' => 'photo','visible' => 0,'data' => '/legacy/images/empty_photo.gif'),
        array('user_id' => $user->id,'type' => 'n','name' => 'note','z' => 0,'x' => 125,'y' => 38,'skin' => 'note_skin','visible' => 1,'data' => 'Remember!
Posting personal information about yourself or your friends, including addresses, phone numbers or email, and getting round the filter will result in your note being deleted.
Deleted notes will not be funded.'),
        array('user_id' => $user->id,'type' => 'n','name' => 'note','z' => 0,'x' => 56,'y' => 229,'skin' => 'bubble_skin','visible' => 1,'data' => 'Welcome to a brand new Habbo Home page!
This is the place where you can express yourself with a wild and unique variety of stickers, hoot yo
trap off with colourful notes and showcase your Habbo rooms! To
start editing just click the edit button.'),
        array('user_id' => $user->id,'type' => 'n','name' => 'note','z' => 0,'x' => 110,'y' => 429,'skin' => 'notepad_skin','visible' => 1,'data' => 'Where are my friends?
To add your buddy list to your page click edit and look in your widgets inventory. After placing it on the page you can move it all over the place and even change how it looks. Go on!'),
array('user_id' => $user->id,'type' => 's','name' => 'sticker_spaceduck','z' => 150,'x' => 260,'y' => 376,'skin' => null,'visible' => 1,'data' => null),
array('user_id' => $user->id,'type' => 's','name' => 'needle_3','z' => 150,'x' => 119,'y' => 29,'skin' => null,'visible' => 1,'data' => null),
array('user_id' => $user->id,'type' => 's','name' => 'paper_clip_1','z' => 150,'x' => 143,'y' => 398,'skin' => null,'visible' => 1,'data' => null)
      );
      \App\Models\CMS\Homes::insert($data);
    }
    $widgets     = Homes::where('user_id', $user->id)->where('type','w')->orderBy('z')->get();
    $stickers     = Homes::where('user_id', $user->id)->where('type','s')->where('visible','1')->orderBy('z')->get();
    $badges      = \App\Models\User\User_Badges::where('user_id', $user->id)->take(50)->inRandomOrder()->get();
    $rooms       = \App\Models\Hotel\Room::where('owner_id', $user->id)->take(10)->inRandomOrder()->get();
    $friend_data = \App\Models\Hotel\Friendship::whereHas('habbo')->where('user_one_id', $user->id)->take(12)->inRandomOrder()->get();
    $photos      = Camera_web::where('user_id', $user->id)->take(12)->inRandomOrder()->get();
    $groups      = GroupMembership::where('user_id', $user->id)->whereHas('guild')->take(12)->inRandomOrder()->get();
    $personal    =  false;
    if($user->id == auth()->user()->id) $personal = true;
    $background     = Homes::where('user_id', $user->id)->where('type','b')->where('visible','1')->first();
    $photo = Homes::where('user_id', $user->id)->where('type','w')->where('name','photo')->first();
    $notes = Homes::where('user_id', $user->id)->where('type','n')->get();
    return view('pages.me.home', [
        'background' => $background,
        'user'    => $user,
        'badges'  => $badges,
        'rooms'   => $rooms,
        'friends' => $friend_data,
        'photos'  => $photos,
        'groups'  => $groups,
        'group'   => 'me',
        'widgets' => $widgets,
        'stickers'=> $stickers,
        'personal' => $personal,
        'edit' => $edit,
        'photo' => $photo,
        'notes' => $notes
      ]
    );
  }
  public function save() {
    $encode = json_encode(Request::json()->all());
    $area = json_decode($encode);
    foreach($area as $i => $v)
    {
      Homes::where('user_id', auth()->user()->id)->where('id',$v->id)->update([
        'z' => $v->z,
        'x' => $v->x,
        'y' => $v->y,
        'skin' => $v->skin,
        'data' => $v->data
      ]);
    }
  }
  public function delete() {
    $area = Request::json()->all();
    if($area['type'] == 'n') {
      Homes::where('user_id', auth()->user()->id)->where('id',$area['id'])->delete();
    } else {
      Homes::where('user_id', auth()->user()->id)->where('id',$area['id'])->update(['visible' => '0','z' => '0','x' => '0','y' => '0']);
    }
  }
  public function add() {
    $area = Request::json()->all();
    if(isset($area['type']) && $area['type'] == 'b') {
      Homes::where('user_id', auth()->user()->id)->where('type','b')->update(['visible' => '0']);
    }
    Homes::where('user_id', auth()->user()->id)->where('id',$area['id'])->update(['visible' => '1']);
    $element = Homes::where('user_id', auth()->user()->id)->where('id',$area['id'])->first();
    return [
        'id'   => $element->id,
        'name' => $element->name,
        'z' => $element->z,
        'x' => $element->x,
        'y' => $element->y,
        'skin' => $element->skin,
        'type' => $element->type
    ];
  }
  public function store() {
    $stickers = Homes::where('user_id', auth()->user()->id)->where('type','s')->where('visible','0')->orderBy('id','DESC')->get();
    $homes = Homes::where('user_id', auth()->user()->id)->where('type','b')->get();
    $data = [];
    foreach($homes as $home) {
      $data[] = $home->name;
    }
    $store_bgs = \App\Models\CMS\Homes_Catalogue::whereNotIn('data', $data)->where('type','b')->get();
    $bgs = Homes::where('user_id', auth()->user()->id)->where('type','b')->where('visible','0')->orderBy('z')->get();
    $widgets = Homes::where('user_id',auth()->user()->id)->where('type','w')->where('visible','0')->get();
    return view('pages.me.homes.web_store',[
      'stickers' => $stickers,
      'bgs' => $bgs,
      'store_bgs' => $store_bgs,
      'widgets' => $widgets
    ]);
  }
  public function buy() {
    $area = Request::json()->all();
    Homes::where('user_id', auth()->user()->id)->where('id',$area['id'])->update(['visible' => '1']);
    \App\Models\CMS\Homes::insert([
      'user_id' => auth()->user()->id,
      'name' => $area['name'],
      'z' => 0,
      'x' => 0,
      'y' => 0,
      'skin' => null,
      'type' => $area['type'],
      'visible' => 0
    ]);
    return ['status'   => 'success','type'=> $area['type']];
  }
  public function note() {
    $data = new Homes;
    $data->user_id = auth()->user()->id;
    $data->name = 'note';
    $data->z = 0;
    $data->x = 0;
    $data->y = 0;
    $data->skin = request()->get('note_skin');
    $data->type = 'n';
    $data->visible = 1;
    $data->data = request()->get('note_message');
    $data->save();
    $element = Homes::where('user_id', auth()->user()->id)->where('id',$data->id)->first();
    return [
        'id'   => $element->id,
        'name' => $element->name,
        'z' => $element->z,
        'x' => $element->x,
        'y' => $element->y,
        'skin' => $element->skin,
        'type' => $element->type,
        'data' => $element->data
    ];
  }
}
