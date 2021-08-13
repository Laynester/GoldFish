<?php

namespace App\Http\Controllers\Housekeeping\Server;

use Request;
use Illuminate\Http\Request as Req;
use App\Http\Controllers\Controller;
use App\Helpers\CMS;
use App\Models\Hotel\Vouchers as Insert;

class VouchersController extends Controller
{
  public function __invoke(Req $request)
  {
    if (CMS::fuseRights('server_vouchers')) {
      if (Request::isMethod('post')) {
        $validatedData = $request->validate([
          'code'    => 'required',
          'credits' => 'required',
          'points'  => 'required',
          'type'    => 'required',
          'item'    => 'required'
        ]);
        Insert::create([
          'code'            => request()->get('code'),
          'credits'         => request()->get('credits'),
          'points'          => request()->get('points'),
          'points_type'     => request()->get('type'),
          'catalog_item_id' => request()->get('item')
        ]);
        \App\Models\CMS\Hk::create([
          'user_id' => auth()->user()->id,
          'ip' => request()->ip(),
          'action' => 'Created a new voucher ('.request()->get('code').')',
          'timestamp' => time()
        ]);
        return redirect()->back()->withSuccess('Added Voucher');
      }
      $vouchers = Insert::paginate(20);
      return view('server.vouchers', [
          'group' => 'server',
          'vouchers' => $vouchers
        ]
      );
    } else {
      return redirect('housekeeping/dashboard');
    }
  }
}
