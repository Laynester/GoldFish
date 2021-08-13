<?php

namespace App\Http\Controllers\Housekeeping\Server;

use Request;
use Illuminate\Http\Request as Req;
use App\Http\Controllers\Controller;
use App\Helpers\CMS;
use App\Models\Hotel\Navigator_Pubcat;
use App\Models\Hotel\Navigator_Publics;
use App\Models\Hotel\Room;
use App\Helpers\Rcon;

class PublicsController extends Controller
{
  public function index($id = null, Req $request)
  {
    if (CMS::fuseRights('server_publics')) {
      if (Request::isMethod('post')) {
        $validatedData = $request->validate([
          'category' => 'required',
          'room'     => 'required',
          'visible'  => 'required'
        ]);
        if (request()->get('category') == '-1') {
          Room::where('id', request()->get('room'))->update([
            'is_public' => '1'
          ]);
        } else {
          Navigator_Publics::create([
            'public_cat_id' => request()->get('category'),
            'room_id'       => request()->get('room'),
            'visible'       => request()->get('visible'),
          ]);
        }
        Rcon::execCommand(auth()->user()->id, ':update_navigator');
        \App\Models\CMS\Hk::create([
          'user_id' => auth()->user()->id,
          'ip' => request()->ip(),
          'action' => 'Created a public room ('.request()->get('room').')',
          'timestamp' => time()
        ]);
        return redirect()->back()->withSuccess('Created public room!');
      }
      if (isset($_GET['hide'])) {
        Navigator_Publics::where('room_id', $_GET['hide'])->update([
          'visible' => '0',
        ]);
        return redirect()->back()->withSuccess('Made room hidden');
      }
      if (isset($_GET['show'])) {
        Navigator_Publics::where('room_id', $_GET['show'])->update([
          'visible' => '1',
        ]);
        return redirect()->back()->withSuccess('Made room visible room');
      }
      if (isset($_GET['remove'])) {
        if (isset($_GET['type']) && $_GET['type'] = 'category') {
          Navigator_Publics::where('room_id', $_GET['remove'])->delete();
          return redirect()->back()->withErrors(['Deleted']);
        } else {
          Room::where('id', $_GET['remove'])->update([
            'is_public' => '0'
          ]);
          return redirect()->back()->withErrors(['Deleted']);
        }
      }
      $categories = Navigator_Pubcat::get();
      $rooms1 = Navigator_Publics::paginate(10);
      $publics = Room::where('is_public', '1')->paginate(10);
      return view('server.publics', [
          'group'      => 'server',
          'categories' => $categories,
          'rooms1'     => $rooms1,
          'publics'    => $publics
        ]
      );
    } else {
      return redirect('housekeeping/dashboard');
    }
  }
  public function categories($id = '', Req $request)
  {
    if (CMS::fuseRights('server_publiccats')) {
      if (Request::isMethod('post')) {
        if (request()->get('id')) {
          $validatedData = $request->validate([
            'id'      => 'required',
            'name'    => 'required',
            'image'   => 'required',
            'visible' => 'required',
            'order'   => 'required'
          ]);
          Navigator_Pubcat::where('id', request()->get('id'))->update([
            'name'      => request()->get('name'),
            'image'     => request()->get('image'),
            'visible'   => request()->get('visible'),
            'order_num' => request()->get('order')
          ]);
          return redirect('housekeeping/server/publiccats')->withSuccess('Saved');
        } else {
          $validatedData = $request->validate([
            'name'    => 'required',
            'image'   => 'required',
            'visible' => 'required',
            'order'   => 'required'
          ]);
          Navigator_Pubcat::create([
            'name'      => request()->get('name'),
            'image'     => request()->get('image'),
            'visible'   => request()->get('visible'),
            'order_num' => request()->get('order')
          ]);
          return redirect()->back()->withSuccess('Created');
        }
      }
      $categories = Navigator_Pubcat::get();
      $catdata = null;
      if (!empty($id)) {
        $catdata = Navigator_Pubcat::where('id', $id)->first();
      }
      return view('server.publiccats', [
          'group'      => 'server',
          'categories' => $categories,
          'catdata'    => $catdata
        ]
      );
    } else {
      return redirect('housekeeping/dashboard');
    }
  }
  public static function destroy($id)
  {
    if (CMS::fuseRights('server_publiccats')) {
      Navigator_Pubcat::where('id', $id)->delete();
      return redirect()->back()->withErrors('Deleted');
    } else {
      return redirect('housekeeping/dashboard');
    }
  }
}
