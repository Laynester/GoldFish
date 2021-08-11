<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;

class NitroController extends Controller
{
    public function index()
    {
        $sso = auth()->user()->ssoTicket();

        return view('nitro', [
            'sso' => $sso
        ]);
    }

}
