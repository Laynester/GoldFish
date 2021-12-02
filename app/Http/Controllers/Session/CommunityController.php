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
        $otherArticles = News::query()->skip('3')->take('7')->latest('date')->get();
        $users = User::inRandomOrder()->take(16)->get();
        $randomOnlineUsers = User::query()
            ->where('online', '=', '1')
            ->inRandomOrder()
            ->take(8)
            ->get();
        $randomUsers = User::inRandomOrder()->take(8)->get();

        return view('community.community', [
            'group' => 'community',
            'news' => $news,
            'otherArticles' => $otherArticles,
            'users' => $users,
            'randomOnlineUsers' => $randomOnlineUsers,
            'randomUsers' => $randomUsers,
        ]);
    }
}
