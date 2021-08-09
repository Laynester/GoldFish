<?php

namespace App\Http\Controllers\Housekeeping\Server;

use Request;
use Illuminate\Http\Request as Req;
use App\Http\Controllers\Controller;
use App\Helpers\CMS;
use App\Models\Hotel\Wordfilter as Insert;

class Wordfilter extends Controller
{
  public function index(Req $request)
  {
    if (CMS::fuseRights('server_wordfilter')) {
      if (Request::isMethod('post')) {
        $validatedData = $request->validate([
          'key'         => 'required',
          'replacement' => 'required',
          'hide'        => 'required',
          'report'      => 'required',
          'mute'        => 'required'
        ]);
        Insert::create([
          'key'         => request()->get('key'),
          'replacement' => request()->get('replacement'),
          'hide'        => request()->get('hide'),
          'report'      => request()->get('report'),
          'mute'        => request()->get('mute')
        ]);
        \App\Models\CMS\Hk::create([
          'user_id' => auth()->user()->id,
          'ip' => request()->ip(),
          'action' => 'Filtered the word  ('.request()->get('key').')',
          'timestamp' => time()
        ]);
        return redirect()->back()->withSuccess('Added word');
      }
      $words = Insert::paginate(20);
      return view('server.wordfilter',[
          'group' => 'server',
          'words' => $words
        ]
      );
    } else {
      return redirect('housekeeping/dashboard');
    }
  }
}
