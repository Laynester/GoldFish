<?php

namespace App\Http\Controllers\Session;

use App\Models\CMS\Alerts;
use App\Models\User\User;
use App\Models\User\User_Badges;
use Auth;
use App\Http\Controllers\Controller;
use App\Models\CMS\News;
use App\Models\Hotel\Friendship;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class MeController extends Controller
{
    public function index()
    {
        $badges = User_Badges::query()->where('user_id', auth()->id())->take(32)->get();
        $news = News::query()->orderBy('date', 'DESC')->take(3)->get();
        $otherArticles = News::query()->skip('3')->take('7')->latest('date')->get();
        $friends = Friendship::query()->where('user_one_id', auth()->id())->inRandomOrder()->take(5)->get();
        $friendsOnlineCount = Friendship::query()
            ->whereHas('habbo', function ($query) {
                $query->where('online', '1');
            })
            ->where('user_one_id', auth()->id())
            ->get();
        $alerts = Alerts::query()->latest('id')->get();

        return view('me.me', [
                'group' => 'home',
                'badges' => $badges,
                'news' => $news,
                'otherArticles' => $otherArticles,
                'currency' => Auth::user()->currency,
                'friends' => $friends,
                'onlineFriends' => $friendsOnlineCount,
                'alerts' => $alerts,
            ]
        );
    }

    public function destroy($id)
    {
        \App\Models\CMS\Alerts::where('userid', Auth()->User()->id)->orWhere('id', $id)->delete();
        return redirect()->back();
    }

    public function search(Request $request): RedirectResponse
    {
        $user = User::query()
            ->where('username', '=', $request->input('search'))
            ->first();

        if (!$user) {
            return redirect()->back()->withErrors('User not Found.');
        }

        return redirect()->route('profile.show', $user);
    }
}
