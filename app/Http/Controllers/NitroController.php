<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;

class NitroController extends Controller
{
    public function index()
    {
        $sso = Str::uuid();

        auth()->user()->update([
            'auth_ticket' => $sso
        ]);

        return view('nitro', [
            'sso' => $sso
        ]);
    }

}
