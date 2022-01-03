<?php

namespace App\Http\Controllers\Session;

use App\Models\CMS\News;
use App\Models\User\User;
use App\Models\CMS\Alerts;
use Illuminate\Http\Request;
use App\Models\User\UserBadge;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\Models\Hotel\MessengerFriendship;

class MeController extends Controller
{
    public function index()
    {
        $badges = UserBadge::query()
            ->where('user_id', auth()->id())
            ->take(32)
            ->get();

        $news = News::query()
            ->latest('date')
            ->take(3)
            ->get();

        $otherArticles = News::query()
            ->skip('3')
            ->take('7')
            ->latest('date')
            ->get();

        $onlineFriends = MessengerFriendship::query()
            ->where('user_one_id', '=', auth()->id())
            ->where('user_two_id', '!=', auth()->id())
            ->distinct()
            ->whereHas('friend', function($query) {
                $query->where('online', '=', '1');
            })
            ->get();

        $alerts = Alerts::query()
            ->latest('id')
            ->get();

        return view('me.me', [
                'group' => 'home',
                'badges' => $badges,
                'news' => $news,
                'otherArticles' => $otherArticles,
                'currency' => auth()->user()->currency,
                'onlineFriends' => $onlineFriends,
                'alerts' => $alerts,
            ]
        );
    }

    public function destroy($id)
    {
        Alerts::query()
            ->where('userid', auth()->user()->id)
            ->orWhere('id', $id)
            ->delete();

        return redirect()->back();
    }

    public function search(Request $request): RedirectResponse
    {
        $user = User::query()
            ->where('username', '=', $request->input('search'))
            ->first();

        if (!$user) {
            return redirect()->back()->withErrors(__('No user with that name, was found.'));
        }

        return redirect()->route('profile.show', $user);
    }
}
