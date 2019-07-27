<?php
// Installer
Route::middleware(['setTheme:Install'])->prefix('installer')->group(function () {
  Route::get('/',function () {return redirect('installer/index');});
  Route::any('index', 'Installation\Index@render')->name('installer');
  Route::any('step/{id}', 'Installation\Index@steps')->name('steps');
});

// Guest
Route::middleware(['installer','changeTheme'])->group(function () {
  Route::get('/', function () {return redirect('login');});
  Route::get('index', function () {return redirect('login');})->name('index');
  Route::get('logout', ['as' => 'logout', 'uses' => 'Auth\LoginController@logout']);
  Auth::routes();
  Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
  Route::post('login', 'Auth\LoginController@login');
  Route::post('logout', 'Auth\LoginController@logout')->name('logout');
});

// Authenticated
Route::middleware(['changeTheme','auth','Banned','Findretros'])->group(function () {
  Route::get('banned', 'Session\Banned@render')->name('banned');
  // Home
  Route::get('me', 'Session\Me@render')->name('me');
  Route::get('home/{username}', 'Session\Home@showProfile')->name('home');
  Route::get('client', 'Session\Client@render')->name('client');
  Route::any('settings', 'Session\Settings@render')->name('settings');
  Route::any('settings/password', 'Session\Settings@account')->name('settings_password');
  });
Route::middleware(['changeTheme','Banned','Findretros'])->group(function () {
  Route::get('/api','Session\API@return');
  Route::get('community', 'Session\Community@render')->name('community');
  Route::get('community/articles', 'Session\Articles@render')->name('articles');
  Route::get('community/articles/{id}', 'Session\Articles@renderNews')->name('articles');
  Route::get('community/staff', 'Session\Staff@render')->name('staff');
  Route::get('community/leaderboards', 'Session\Leaderboards@render')->name('leaderboards');
  Route::get('community/photos', 'Session\Photos@render')->name('photos');
});

// Admin
Route::middleware(['auth', 'setTheme:Admin'])->prefix('housekeeping')->group(function () {
  Route::get('/', function () { return redirect('/housekeeping/dashboard'); });
  Route::any('dashboard', 'Housekeeping\Dashboard@render')->name('dashboard');
  Route::get('update/check','Housekeeping\Updater@check')->name('update_checker');
  Route::get('update/update','Housekeeping\Updater@update')->name('updater');

  //server
  Route::any('server/client', 'Housekeeping\Server\Client@render')->name('hk_server_client');
  Route::any('server/emulator', 'Housekeeping\Server\Emulator@render')->name('hk_server_emulator');
  Route::any('server/publics', 'Housekeeping\Server\Publics@render')->name('hk_server_publics');
  Route::any('server/publiccats/{id?}', 'Housekeeping\Server\Publics@categories')->name('hk_server_publiccats');
  Route::any('server/publiccats/delete/{id}', 'Housekeeping\Server\Publics@categoriesremove')->name('hk_server_publiccats_delete');
  Route::any('server/vouchers', 'Housekeeping\Server\Vouchers@render')->name('hk_server_vouchers');
  Route::any('server/rcon/{key?}', 'Housekeeping\Server\Rcon@render')->name('hk_server_rcon');

  // user & moderation
  Route::any('moderation/chatlog/list/{id?}', 'Housekeeping\UserMod\Chatlog@list')->name('hk_chat_list');
  Route::any('moderation/lookup/user/{user?}', 'Housekeeping\UserMod\User@render')->name('hk_user_lookup');
  Route::any('moderation/bans', 'Housekeeping\UserMod\Bans@render')->name('hk_user_bans');
  Route::any('moderation/badges', 'Housekeeping\UserMod\Badges@render')->name('hk_user_badges');
  Route::any('moderation/online', 'Housekeeping\UserMod\User@online')->name('hk_users_online');

  //site and content
  Route::any('site/settings1', 'Housekeeping\Site\Settings1@render')->name('hk_settings1');
  Route::any('site/settings2', 'Housekeeping\Site\Settings2@render')->name('hk_settings2');
  Route::any('site/news/list', 'Housekeeping\Site\News@List')->name('hk_newslist');
  Route::any('site/news/create', 'Housekeeping\Site\News@Create')->name('hk_createnews');
  Route::any('site/news/edit/{id}', 'Housekeeping\Site\News@Edit')->name('hk_editnews');
  Route::any('site/news/delete/{id}', 'Housekeeping\Site\News@Delete')->name('hk_newsdelete');
  Route::any('site/alert', 'Housekeeping\Site\Alert@render')->name('salert');
  Route::any('site/rights', 'Housekeeping\Site\Rights@render')->name('hk_rights');
});
