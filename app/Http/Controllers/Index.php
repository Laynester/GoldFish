<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;

class Index extends Controller
{
    public function render()
    {
      if(Auth::check()) {
        //This condition will run if the user is logged in !
        return redirect('me');
    }
        return view('auth.login');
    }
}
