<?php
namespace App\Http\Controllers\Housekeeping\Server;

use Auth;
use Request;
use Illuminate\Http\Request as Req;
use App\Http\Controllers\Controller;
use App\Helpers\CMS;
use App\Models\CMS\Settings;

class Client extends Controller
{
  public function render(Req $request)
  {
    if(auth()->user()->rank >= CMS::fuseRights('server_client')){
      if (Request::isMethod('post'))
      {
        $validatedData = $request->validate([
          'swfdir'   => 'required',
          'swf' => 'required',
          'variables' => 'required',
          'override_variables' => 'required',
          'texts' => 'required',
          'override_texts' => 'required',
          'productdata' => 'required',
          'furnidata' => 'required',
          'figuremap' => 'required',
          'figuredata' => 'required'
        ]);
        Settings::where('key', 'swfdir')->update(['value' => request()->get('swfdir')]);
        Settings::where('key', 'swf')->update(['value' => request()->get('swf')]);
        Settings::where('key', 'variables')->update(['value' => request()->get('variables')]);
        Settings::where('key', 'override_variables')->update(['value' => request()->get('override_variables')]);
        Settings::where('key', 'texts')->update(['value' => request()->get('texts')]);
        Settings::where('key', 'override_texts')->update(['value' => request()->get('override_texts')]);
        Settings::where('key', 'productdata')->update(['value' => request()->get('productdata')]);
        Settings::where('key', 'furnidata')->update(['value' => request()->get('furnidata')]);
        Settings::where('key', 'figuremap')->update(['value' => request()->get('figuremap')]);
        Settings::where('key', 'figuredata')->update(['value' => request()->get('figuredata')]);
        return redirect()->back()->withSuccess('Updated client settings!');
      }
      return view('server.client',
      [
        'group' => 'server',
      ]);
    }
    else {
      return redirect('housekeeping/dashboard');
    }
  }
}
