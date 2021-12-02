<?php

namespace App\Http\Controllers\Session;

use App\Http\Controllers\Controller;
use App\Helpers\CMS;
use App\Models\CMS\News;

class MaintenanceController extends Controller
{
    public function index()
    {
        if (CMS::settings('maintenance') == 1) {
            if (Auth()->User() && Auth()->User()->rank >= CMS::settings('maintenance_rank')) {
                return redirect('me');
            }
            return view('maintenance', ['group' => 'home']);
        } else {
            return redirect('me');
        }
    }
    public function login()
    {
        if (CMS::settings('maintenance') == 1) {
            $news = News::orderBy('date', 'DESC')->take(9)->get();
            return view('auth.login', [
                    'group' => 'home',
                    'news'  => $news
                ]
            );
        } else {
            return redirect('me');
        }
    }
}
