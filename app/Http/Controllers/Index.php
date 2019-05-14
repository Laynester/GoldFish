<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use App\Models\CMS\News;

class Index extends Controller
{
    public function render()
    {
      if(Auth::check()) {
        //This condition will run if the user is logged in !
        return redirect('me');
    }
        $news = News::orderBy('date', 'DESC')->take(9)->get();
        return view('auth.login',[
          'group' => 'home',
          'news' => $news
        ]);
    }
}
