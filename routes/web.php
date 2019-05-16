<?php

// Guest
Route::middleware([])->group(function () {
  Route::get('/', function () {return redirect('login');});
  Route::get('index', function () {return redirect('login');})->name('index');
  Route::get('logout', ['as' => 'logout', 'uses' => 'Auth\LoginController@logout']);
  Auth::routes();
  Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
  Route::post('login', 'Auth\LoginController@login');
  Route::post('logout', 'Auth\LoginController@logout')->name('logout');
});

// Authenticated
Route::middleware(['auth'])->group(function () {
  // Home
  Route::get('me', 'Session\Me@render')->name('me');
  Route::get('home/{username}', 'Session\Home@showProfile')->name('home');
  Route::get('client', 'Session\Client@render')->name('client');
  Route::any('settings', 'Session\Settings@render')->name('settings');
  Route::any('settings/account', 'Session\Settings@account')->name('settings_account');
  });
Route::middleware([])->group(function () {
  Route::get('/api','Session\API@return');
  Route::get('community', 'Session\Community@render')->name('community');
  Route::get('community/articles', 'Session\Articles@render')->name('articles');
  Route::get('community/articles/{id}', 'Session\Articles@renderNews')->name('articles');
  Route::get('community/staff', 'Session\Staff@render')->name('staff');
  Route::get('community/leaderboards', 'Session\Leaderboards@render')->name('leaderboards');
  Route::get('community/photos', 'Session\Photos@render')->name('photos');
});

// Admin
Route::middleware(['auth', 'setTheme:Admin'])->group(function () {
  Route::get('housekeeping', function () { return redirect('/housekeeping/dashboard'); });
  Route::get('housekeeping/dashboard', 'Housekeeping\Dashboard@render')->name('dashboard');

  //site and content
  Route::any('housekeeping/site/settings1', 'Housekeeping\Site\Settings1@render')->name('hk_settings1');
  Route::any('housekeeping/site/settings2', 'Housekeeping\Site\Settings2@render')->name('hk_settings2');
  Route::any('housekeeping/site/news/list', 'Housekeeping\Site\News@List')->name('hk_newslist');
  Route::any('housekeeping/site/news/create', 'Housekeeping\Site\News@Create')->name('hk_createnews');
  Route::any('housekeeping/site/news/edit/{id}', 'Housekeeping\Site\News@Edit')->name('hk_editnews');
  Route::any('housekeeping/site/news/delete/{id}', 'Housekeeping\Site\News@Delete')->name('hk_newsdelete');
  Route::any('housekeeping/site/alert', 'Housekeeping\Site\Alert@render')->name('salert');
});
