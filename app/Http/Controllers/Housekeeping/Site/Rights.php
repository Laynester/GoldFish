<?php

namespace App\Http\Controllers\Housekeeping\Site;

use Request;
use App\Http\Controllers\Controller;
use App\Helpers\CMS;
use App\Models\CMS\FuseRight;
use App\Models\User\Permissions;

class Rights extends Controller
{
    public function render()
    {
        if (CMS::fuseRights('site_rights')) {
            if (Request::isMethod('post')) {
                $key = request()->get('key');
                foreach ($key as $row) {
                    Fuseright::where('right', $row['name'])->update(['min_rank' => $row['value']]);
                }
                \App\Models\CMS\Hk::create([
                    'user_id' => auth()->user()->id,
                    'ip' => request()->ip(),
                    'action' => 'Made changes to the HK Fuserights',
                    'timestamp' => time()
                  ]);
                return redirect()->back()->withSuccess('Saved permissions!');
            }
            $tabs        = Fuseright::where('type', 1)->get();
            $subnavi     = Fuseright::where('type', 2)->get();
            $links       = Fuseright::where('type', 3)->get();
            $permissions = Permissions::all();

            return view('site.rights', [
                    'group'       => 'site',
                    'tabs'        => $tabs,
                    'permissions' => $permissions,
                    'subnavi'     => $subnavi,
                    'links'       => $links
                ]
            );
        } else {
            return redirect('housekeeping/dashboard');
        }
    }
}
