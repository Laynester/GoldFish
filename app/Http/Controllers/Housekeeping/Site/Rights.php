<?php
namespace App\Http\Controllers\Housekeeping\Site;

use Auth;
use Request;
use App\Http\Controllers\Controller;
use App\Helpers\CMS;
use App\Models\CMS\FuseRight;
use App\Models\User\Permissions;

class Rights extends Controller
{
  public function render()
  {
    if(CMS::fuseRights('site_rights')) {
        if (Request::isMethod('post'))
        {
            $key = request()->get('key');
            foreach($key as $row) {
                Fuseright::where('right', $row['name'])->update(['min_rank' => $row['value']]);
            }
            return redirect()->back()->withSuccess('Saved permissions!');
        }
        $form = Fuseright::all()->sortBy('right');
        $permissions = Permissions::all();
        
        return view('site.rights',
        [
            'group' => 'site',
            'form' => $form,
            'permissions' => $permissions
        ]);
    } else {
        return redirect('housekeeping/dashboard');
    }
  }
}