<?php

namespace App\Http\Controllers;

use App\Rules\IsCurrentPasswordRule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserPasswordController extends Controller
{
    public function edit()
    {
        return view('user.settings.password', [
            'group' => 'home'
        ]);
    }

    public function update(Request $request)
    {
        $request->validate([
            'current_password' => ['required', new IsCurrentPasswordRule()],
            'password' => ['required', 'min:6', 'confirmed'],
        ]);

        $request->user()->update([
            'password' => Hash::make($request->input('password'))
        ]);

        return redirect()->back()->with('success', __('Your password has been updated!'));
    }
}
