<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Index extends Controller
{
    public function render()
    {
        return view('auth.login');
    }
}
