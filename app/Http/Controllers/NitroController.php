<?php

namespace App\Http\Controllers;

class NitroController extends Controller
{
    public function __invoke()
    {
        return view('nitro', [
            'sso' => auth()->user()->ssoTicket()
        ]);
    }

}
