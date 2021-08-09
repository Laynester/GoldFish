<?php

// Installer
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Housekeeping\Dashboard;
use App\Http\Controllers\Housekeeping\Server\Emulator;
use App\Http\Controllers\Housekeeping\Server\Logs;
use App\Http\Controllers\Housekeeping\Server\Publics;
use App\Http\Controllers\Housekeeping\Server\Rcon;
use App\Http\Controllers\Housekeeping\Server\Vouchers;
use App\Http\Controllers\Housekeeping\Server\Wordfilter;
use App\Http\Controllers\Housekeeping\Site\Alert;
use App\Http\Controllers\Housekeeping\Site\News;
use App\Http\Controllers\Housekeeping\Site\Rights;
use App\Http\Controllers\Housekeeping\Site\Settings1;
use App\Http\Controllers\Housekeeping\Site\Settings2;
use App\Http\Controllers\Housekeeping\Updater;
use App\Http\Controllers\Housekeeping\UserMod\Badges;
use App\Http\Controllers\Housekeeping\UserMod\Bans;
use App\Http\Controllers\Housekeeping\UserMod\Chatlog;
use App\Http\Controllers\Housekeeping\UserMod\Password;
use App\Http\Controllers\Housekeeping\UserMod\User;
use App\Http\Controllers\Installation\Index;
use App\Http\Controllers\Session\Articles;
use App\Http\Controllers\Session\Banned;
use App\Http\Controllers\Session\Client;
use App\Http\Controllers\Session\Community;
use App\Http\Controllers\Session\Home;
use App\Http\Controllers\Session\Leaderboards;
use App\Http\Controllers\Session\Maintenance;
use App\Http\Controllers\Session\Me;
use App\Http\Controllers\Session\Photos;
use App\Http\Controllers\Session\Settings;
use App\Http\Controllers\Session\Staff;
use App\Http\Controllers\Housekeeping\Server\Client as HousekeepingClient;

Route::middleware(['setTheme:Install'])->prefix('installer')->group(function () {
  Route::get('/' ,function () {
        return redirect('installer/index');
  });

  Route::any('/index', [Index::class, 'index'])->name('installer');
  Route::any('/step/{id}', [Index::class, 'steps'])->name('steps');
});

// Guest
Route::middleware(['installer','changeTheme','Maintenance', 'guest'])->group(function () {
    Route::get('/', function () {
        return redirect('login');
    });
    Route::get('index', function () {
        return redirect('login');
    })->name('index');

    Auth::routes();

    // Login routes
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login.index');
    Route::post('/login', [LoginController::class, 'login'])->name('login.store');
    Route::get('/maintenance', [Maintenance::class, 'index'])->name('maintenance.index');
    Route::get('/maintenance/login',[Maintenance::class, 'login'])->name('maintenance.login');
    Route::post('maintenance', [LoginController::class, 'login'])->name('maintenance.login.post');
    Route::post('maintenance/login', [LoginController::class, 'login']);
});

// Authenticated
Route::middleware(['changeTheme', 'Banned', 'Maintenance', 'Findretros'])->group(function () {
    Route::middleware(['auth'])->group(function() {
        Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
        Route::get('/banned', [Banned::class, 'index'])->name('banned');

        // Me routes
        Route::get('/me', [Me::class, 'index'])->name('me.index');
        Route::post('/search', [Me::class, 'search'])->name('me.search');
        Route::get('/me/delete/{id}', [Me::class, 'destroy'])->name('alert.destroy');

        // Settings routes
        Route::get('/settings', [Settings::class, 'index'])->name('settings.index');
        Route::post('/settings', [Settings::class, 'postHotel'])->name('settings.hotel-post');
        Route::get('/settings/password', [Settings::class, 'account'])->name('settings.password');
        Route::post('/settings/password', [Settings::class, 'postAccount'])->name('settings.password');

        // User profile routes
        Route::get('/home/{username}', [Home::class, 'showProfile'])->name('home');
        Route::post('/home/{username}/note', [Home::class, 'note'])->name('home.note');
        Route::get('/home/{username}/edit', [Home::class, 'showProfile'])->name('home.edit');
        Route::post('/home/{username}/save', [Home::class, 'save'])->name('home.save');
        Route::post('/home/{username}/delete', [Home::class, 'destroy'])->name('home.destroy');
        Route::post('/home/{username}/add', [Home::class, 'add'])->name('home.add');
        Route::post('/home/{username}/buy', [Home::class, 'buy'])->name('home.buy');
        Route::get('/habblet/store', [Home::class, 'store'])->name('home.store');

        // Game routes
        Route::get('/client', [Client::class, 'index'])->name('game.index');
    });

    // Community routes
    Route::get('/community', [Community::class, 'index'])->name('community.index');
    Route::get('/community/articles', [Articles::class, 'index'])->name('articles.index');
    Route::get('/community/articles/{id}', [Articles::class, 'show'])->name('articles.show');
    Route::get('/community/staff', [Staff::class, 'index'])->name('staff.index');
    Route::get('/community/leaderboards', [Leaderboards::class, 'index'])->name('leaderboards.index');
    Route::get('/community/photos', [Photos::class, 'index'])->name('photos.index');
});

// Admin
Route::middleware(['auth', 'setTheme:Admin'])->prefix('housekeeping')->group(function () {
    Route::get('/', function () {
        return redirect('/housekeeping/dashboard');
    });

    // HK Dashboard
    Route::any('/dashboard', [Dashboard::class, 'index'])->name('dashboard');
    Route::get('/credits', [Dashboard::class, 'credits'])->name('credits');

    // HK Updater
    Route::get('/update/check', [Updater::class, 'check'])->name('update_checker');
    Route::get('/update/update', [Updater::class, 'update'])->name('updater');

    // HK Server
    Route::any('/server/client', [HousekeepingClient::class, 'index'])->name('hk.server-client');
    Route::any('/server/emulator', [Emulator::class, 'index'])->name('hk.server-emulator');
    Route::any('/server/publics', [Publics::class, 'index'])->name('hk.server-publics');
    Route::any('/server/publiccats/{id?}',  [Publics::class, 'categories'])->name('hk.server-publiccats');
    Route::any('/server/publiccats/destroy/{id}', [Publics::class, 'destroy'])->name('hk.server-publiccats.destroy');
    Route::any('/server/vouchers', [Vouchers::class, 'index'])->name('hk.server-vouchers');
    Route::any('/server/rcon/{key?}', [Rcon::class, 'index'])->name('hk.server-rcon');
    Route::any('/server/wordfilter', [Wordfilter::class, 'index'])->name('hk.wordfilter');
    Route::get('/server/log/{type}', [Logs::class, 'index'])->name('hk.server-logs');

    // user & moderation
    Route::any('/moderation/chatlog/list', [Chatlog::class, 'list'])->name('hk.chat-list');
    Route::get('/moderation/chatlog/list/room/{id}', [Chatlog::class, 'room'])->name('hk.chat-list-room');
    Route::get('/moderation/chatlog/list/user/{id}', [Chatlog::class, 'user'])->name('hk.chat-list-user');
    Route::any('/moderation/lookup/user/{user?}', [User::class, 'index'])->name('hk.user-lookup');
    Route::any('/moderation/online', [User::class, 'online'])->name('hk.users-online');
    Route::any('/moderation/bans', [Bans::class, 'index'])->name('hk.user-bans');
    Route::any('/moderation/badges', [Badges::class, 'index'])->name('hk.user-badges');
    Route::get('/moderation/passwords', [Password::class, 'index'])->name('hk.users-password');
    Route::post('/moderation/passwords', [Password::class, 'update'])->name('hk.users-password');

    //site and content
    Route::any('/site/settings1', [Settings1::class, 'index'])->name('hk.settings1');
    Route::any('/site/settings2', [Settings2::class, 'render'])->name('hk.settings2');
    Route::any('/site/news/list', [News::class, 'List'])->name('hk.newslist');
    Route::any('/site/news/create', [News::class, 'Create'])->name('hk.createnews');
    Route::any('/site/news/edit/{id}', [News::class, 'Edit'])->name('hk.editnews');
    Route::any('/site/news/delete/{id}', [News::class, 'Delete'])->name('hk.newsdelete');
    Route::any('/site/alert', [Alert::class, 'index'])->name('salert');
    Route::any('/site/rights', [Rights::class, 'index'])->name('hk.rights');
});
