<?php

// Installer
Route::middleware(['setTheme:Install'])->prefix('installer')->group(function () {
  Route::get('/',function () {return redirect('installer/index');});
  Route::any('index', 'Installation\Index@render')->name('installer');
  Route::any('step/{id}', 'Installation\Index@steps')->name('steps');
});

// Guest
Route::middleware(['installer','changeTheme','Maintenance'])->group(function () {
  Route::get('/', function () {return redirect('login');});
  Route::get('index', function () {return redirect('login');})->name('index');
  Route::get('logout', ['as' => 'logout', 'uses' => 'Auth\LoginController@logout']);
  Auth::routes();
  Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
  Route::post('login', 'Auth\LoginController@login');
  Route::post('logout', 'Auth\LoginController@logout')->name('logout');
  Route::get('maintenance','Session\Maintenance@render')->name('maintenance');
  Route::get('maintenance/login','Session\Maintenance@login')->name('maintenance_login');
  Route::post('maintenance','Auth\LoginController@login');
  Route::post('maintenance/login','Auth\LoginController@login');
});

// Authenticated
Route::middleware(['changeTheme','auth','Banned','Maintenance','Findretros'])->group(function () {
  Route::get('banned', 'Session\Banned@render')->name('banned');
  // Home
  Route::get('me', 'Session\Me@render')->name('me');
  Route::post('search', 'Session\Me@search')->name('me_search');
  Route::get('me/delete/{id}', 'Session\Me@delete')->name('alertdelete');
  Route::post('home/{username}/note','Session\Home@note')->name('home_note');
  Route::get('client', 'Session\Client@render')->name('client');
  Route::any('settings', 'Session\Settings@render')->name('settings');
  Route::any('settings/password', 'Session\Settings@account')->name('settings_password');
  });
Route::middleware(['changeTheme','Banned','Maintenance','Findretros'])->group(function () {
  Route::get('community', 'Session\Community@render')->name('community');
  Route::get('community/articles', 'Session\Articles@render')->name('articles');
  Route::get('community/articles/{id}', 'Session\Articles@renderNews')->name('articles');
  Route::get('community/staff', 'Session\Staff@render')->name('staff');
  Route::get('community/leaderboards', 'Session\Leaderboards@render')->name('leaderboards');
  Route::get('community/photos', 'Session\Photos@render')->name('photos');
});
Route::middleware(['changeTheme','auth'])->group(function() {
  Route::get('home/{username}', 'Session\Home@showProfile')->name('home');
  Route::get('home/{username}/edit', 'Session\Home@showProfile')->name('home_edit');
  Route::post('home/{username}/save', 'Session\Home@save')->name('home_save');
  Route::post('home/{username}/delete', 'Session\Home@delete')->name('home_delete');
  Route::post('home/{username}/add', 'Session\Home@add')->name('home_add');
  Route::post('home/{username}/buy', 'Session\Home@buy')->name('home_buy');
  Route::get('habblet/store','Session\Home@store')->name('home_store');
});
// Admin
Route::middleware(['auth', 'setTheme:Admin'])->prefix('housekeeping')->group(function () {
  Route::get('/', function () { return redirect('/housekeeping/dashboard'); });
  Route::any('dashboard', 'Housekeeping\Dashboard@render')->name('dashboard');
  Route::get('update/check','Housekeeping\Updater@check')->name('update_checker');
  Route::get('update/update','Housekeeping\Updater@update')->name('updater');
  Route::get('credits','Housekeeping\Dashboard@credits')->name('credits');

  //server
  Route::any('server/client', 'Housekeeping\Server\Client@render')->name('hk_server_client');
  Route::any('server/emulator', 'Housekeeping\Server\Emulator@render')->name('hk_server_emulator');
  Route::any('server/publics', 'Housekeeping\Server\Publics@render')->name('hk_server_publics');
  Route::any('server/publiccats/{id?}', 'Housekeeping\Server\Publics@categories')->name('hk_server_publiccats');
  Route::any('server/publiccats/delete/{id}', 'Housekeeping\Server\Publics@categoriesremove')->name('hk_server_publiccats_delete');
  Route::any('server/vouchers', 'Housekeeping\Server\Vouchers@render')->name('hk_server_vouchers');
  Route::any('server/rcon/{key?}', 'Housekeeping\Server\Rcon@render')->name('hk_server_rcon');
  Route::any('server/wordfilter', 'Housekeeping\Server\Wordfilter@render')->name('hk_wordfilter');
  Route::get('server/log/{type}', 'Housekeeping\Server\Logs@render')->name('hk_server_logs');

  // user & moderation
  Route::any('moderation/chatlog/list', 'Housekeeping\UserMod\Chatlog@list')->name('hk_chat_list');
  Route::get('moderation/chatlog/list/room/{id}', 'Housekeeping\UserMod\Chatlog@room')->name('hk_chat_list_room');
  Route::get('moderation/chatlog/list/user/{id}', 'Housekeeping\UserMod\Chatlog@user')->name('hk_chat_list_user');
  Route::any('moderation/lookup/user/{user?}', 'Housekeeping\UserMod\User@render')->name('hk_user_lookup');
  Route::any('moderation/bans', 'Housekeeping\UserMod\Bans@render')->name('hk_user_bans');
  Route::any('moderation/badges', 'Housekeeping\UserMod\Badges@render')->name('hk_user_badges');
  Route::any('moderation/online', 'Housekeeping\UserMod\User@online')->name('hk_users_online');
  Route::get('moderation/passwords', 'Housekeeping\UserMod\Password@render')->name('hk_users_password');
  Route::post('moderation/passwords', 'Housekeeping\UserMod\Password@post')->name('hk_users_password');

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
