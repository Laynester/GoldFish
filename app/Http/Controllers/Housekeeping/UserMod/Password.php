<?php

namespace App\Http\Controllers\Housekeeping\UserMod;

use App\Http\Controllers\Controller;
use App\Helpers\CMS;
use Illuminate\Support\Facades\Hash;

class Password extends Controller
{
  public function render()
  {
    if (CMS::fuseRights('moderation_password')) {
        return view('usermod.password', [
                'group' => 'user'
            ]
        );
    } else {
        return redirect('housekeeping/dashboard');
    }
  }
  public function post()
  {
    if (CMS::fuseRights('moderation_password')) {
        $user = \App\Models\User\User::where('username', request()->get('username'))->first();
        if(!empty($user)) {
            if($user->rank > auth()->user()->rank) {
                \App\Models\CMS\Hk::create([
                    'user_id' => auth()->user()->id,
                    'ip' => request()->ip(),
                    'action' => 'Attempted to change '.request()->get('username'). '\'s password.',
                    'timestamp' => time()
                ]);
                return redirect()->back()->withErrors('This user is a higher rank than you...');
            }
            \App\Models\User\User::where('username', request()->get('username'))->update([
                'password'    => Hash::make(request()->get('password'))
            ]);
            \App\Models\CMS\Hk::create([
                'user_id' => auth()->user()->id,
                'ip' => request()->ip(),
                'action' => 'Changed '.request()->get('username'). '\'s password',
                'timestamp' => time()
            ]);
            return redirect()->back()->withSuccess('Changed password.');
        } else {
            return redirect()->back()->withErrors('User not found.');
        }
    } else {
        return redirect('housekeeping/dashboard');
    }
  }
}
