<?php

// Installer
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Housekeeping\DashboardController;
use App\Http\Controllers\Housekeeping\Server\EmulatorController;
use App\Http\Controllers\Housekeeping\Server\LogsController;
use App\Http\Controllers\Housekeeping\Server\PublicsController;
use App\Http\Controllers\Housekeeping\Server\RconController;
use App\Http\Controllers\Housekeeping\Server\VouchersController;
use App\Http\Controllers\Housekeeping\Server\WordfilterController;
use App\Http\Controllers\Housekeeping\Site\AlertController;
use App\Http\Controllers\Housekeeping\Site\NewsController;
use App\Http\Controllers\Housekeeping\Site\RightsController;
use App\Http\Controllers\Housekeeping\Site\Settings1Controller;
use App\Http\Controllers\Housekeeping\Site\Settings2Controller;
use App\Http\Controllers\Housekeeping\Updater;
use App\Http\Controllers\Housekeeping\UserMod\BadgesController;
use App\Http\Controllers\Housekeeping\UserMod\BansController;
use App\Http\Controllers\Housekeeping\UserMod\ChatlogController;
use App\Http\Controllers\Housekeeping\UserMod\PasswordController;
use App\Http\Controllers\Housekeeping\UserMod\UserController;
use App\Http\Controllers\Installation\IndexController;
use App\Http\Controllers\NitroController;
use App\Http\Controllers\Session\ArticlesController;
use App\Http\Controllers\Session\BannedController;
use App\Http\Controllers\Session\GameController;
use App\Http\Controllers\Session\CommunityController;
use App\Http\Controllers\Session\HomeController;
use App\Http\Controllers\Session\LeaderboardsController;
use App\Http\Controllers\Session\MaintenanceController;
use App\Http\Controllers\Session\MeController;
use App\Http\Controllers\Session\PhotosController;
use App\Http\Controllers\Session\UserSettingsController;
use App\Http\Controllers\Session\StaffController;
use App\Http\Controllers\Housekeeping\Server\ClientController as HousekeepingClientController;

Route::middleware(['setTheme:Install'])->prefix('installer')->group(function () {
  Route::get('/' ,function () {
        return redirect('installer/index');
  });

  Route::any('/index', [IndexController::class, 'index'])->name('installer');
  Route::any('/step/{id}', [IndexController::class, 'steps'])->name('steps');


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
    Route::get('/maintenance', [MaintenanceController::class, 'index'])->name('maintenance.index');
    Route::get('/maintenance/login',[MaintenanceController::class, 'login'])->name('maintenance.login');
    Route::post('maintenance', [LoginController::class, 'login'])->name('maintenance.login.post');
    Route::post('maintenance/login', [LoginController::class, 'login']);
});

// Authenticated
Route::middleware(['changeTheme', 'Banned', 'Maintenance', 'Findretros'])->group(function () {
    Route::middleware(['auth'])->group(function() {
        Route::get('logout', [LoginController::class, 'logout']);
        Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
        Route::get('/banned', [BannedController::class, 'index'])->name('banned');

        // Me routes
        Route::get('/me', [MeController::class, 'index'])->name('me.index');
        Route::post('/search', [MeController::class, 'search'])->name('me.search');
        Route::get('/me/delete/{id}', [MeController::class, 'destroy'])->name('alert.destroy');

        // Settings routes
        Route::get('/settings', [UserSettingsController::class, 'index'])->name('settings.index');
        Route::post('/settings', [UserSettingsController::class, 'postHotel'])->name('settings.hotel-post');
        Route::get('/settings/password', [UserSettingsController::class, 'account'])->name('settings.password');
        Route::post('/settings/password', [UserSettingsController::class, 'postAccount'])->name('settings.password');

        // User profile routes
        Route::get('/home/{username}', [HomeController::class, 'showProfile'])->name('home');
        Route::post('/home/{username}/note', [HomeController::class, 'note'])->name('home.note');
        Route::get('/home/{username}/edit', [HomeController::class, 'showProfile'])->name('home.edit');
        Route::post('/home/{username}/save', [HomeController::class, 'save'])->name('home.save');
        Route::post('/home/{username}/delete', [HomeController::class, 'destroy'])->name('home.destroy');
        Route::post('/home/{username}/add', [HomeController::class, 'add'])->name('home.add');
        Route::post('/home/{username}/buy', [HomeController::class, 'buy'])->name('home.buy');
        Route::get('/habblet/store', [HomeController::class, 'store'])->name('home.store');

        // Game routes
        Route::get('/game', GameController::class)->name('game.index');
        Route::get('/nitro', NitroController::class)->name('nitro.index');
    });

    // Community routes
    Route::get('/community', CommunityController::class)->name('community.index');
    Route::get('/community/articles', [ArticlesController::class, 'index'])->name('articles.index');
    Route::get('/community/articles/{article}', [ArticlesController::class, 'show'])->name('articles.show');
    Route::get('/community/staff', StaffController::class)->name('staff.index');
    Route::get('/community/leaderboards', LeaderboardsController::class)->name('leaderboards.index');
    Route::get('/community/photos', PhotosController::class)->name('photos.index');
});

// Admin
Route::middleware(['auth', 'setTheme:Admin'])->prefix('housekeeping')->group(function () {
    Route::get('/', function () {
        return redirect('/housekeeping/dashboard');
    });

    // HK Dashboard
    Route::any('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/credits', [DashboardController::class, 'credits'])->name('credits');

    // HK Updater
//    Route::get('/update/check', [Updater::class, 'check'])->name('update_checker');
//    Route::get('/update/update', [Updater::class, 'update'])->name('updater');

    // HK Server
    Route::any('/server/client', HousekeepingClientController::class)->name('hk.server-client');
    Route::any('/server/emulator', EmulatorController::class)->name('hk.server-emulator');
    Route::any('/server/publics', [PublicsController::class, 'index'])->name('hk.server-publics');
    Route::any('/server/publiccats/{id?}',  [PublicsController::class, 'categories'])->name('hk.server-publiccats');
    Route::any('/server/publiccats/destroy/{id}', [PublicsController::class, 'destroy'])->name('hk.server-publiccats.destroy');
    Route::any('/server/vouchers', VouchersController::class)->name('hk.server-vouchers');
    Route::any('/server/rcon/{key?}', RconController::class)->name('hk.server-rcon');
    Route::any('/server/wordfilter', WordfilterController::class)->name('hk.wordfilter');
    Route::get('/server/log/{type}', LogsController::class)->name('hk.server-logs');

    // user & moderation
    Route::any('/moderation/chatlog/list', [ChatlogController::class, 'list'])->name('hk.chat-list');
    Route::get('/moderation/chatlog/list/room/{id}', [ChatlogController::class, 'room'])->name('hk.chat-list-room');
    Route::get('/moderation/chatlog/list/user/{id}', [ChatlogController::class, 'user'])->name('hk.chat-list-user');
    Route::any('/moderation/lookup/user/{user?}', [UserController::class, 'index'])->name('hk.user-lookup');
    Route::any('/moderation/online', [UserController::class, 'online'])->name('hk.users-online');
    Route::any('/moderation/bans', BansController::class)->name('hk.user-bans');
    Route::any('/moderation/badges', BadgesController::class)->name('hk.user-badges');
    Route::get('/moderation/passwords', [PasswordController::class, 'index'])->name('hk.users-password');
    Route::post('/moderation/passwords', [PasswordController::class, 'update'])->name('hk.users-password');

    //site and content
    Route::any('/site/settings1', Settings1Controller::class)->name('hk.settings1');
    Route::any('/site/settings2', Settings2Controller::class)->name('hk.settings2');
    Route::any('/site/news/list', [NewsController::class, 'List'])->name('hk.newslist');
    Route::any('/site/news/create', [NewsController::class, 'Create'])->name('hk.createnews');
    Route::any('/site/news/edit/{id}', [NewsController::class, 'Edit'])->name('hk.editnews');
    Route::any('/site/news/delete/{id}', [NewsController::class, 'Delete'])->name('hk.newsdelete');
    Route::any('/site/alert', AlertController::class)->name('salert');
    Route::any('/site/rights', RightsController::class)->name('hk.rights');
});
