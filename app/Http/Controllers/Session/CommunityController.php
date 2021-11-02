<?php

namespace App\Http\Controllers\Session;

use App\Http\Controllers\Controller;
use App\Models\CMS\News;
use App\Models\User\User;

class CommunityController extends Controller
{
    public function __invoke()
    {
        $news = News::orderBy('date', 'DESC')->take(5)->get();
        $users = User::inRandomOrder()->take(16)->get();
        $randomUsers = User::inRandomOrder()->take(8)->get();

        return view('pages.community.community', [
            'news' => $news,
            'group' => 'community',
            'users' => $users,
            'randomUsers' => $randomUsers,
        ]);
    }
}
