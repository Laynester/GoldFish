<?php

// Guest
Route::middleware([])->group(function () {
  Route::get('/', 'Index@render')->name('index');
  Route::get('index', function () {return redirect('/');});
  Route::get('logout', ['as' => 'logout', 'uses' => 'Auth\LoginController@logout']);
  Auth::routes();
});

// Authenticated
Route::middleware(['auth'])->group(function () {
  // Home
  Route::get('me', 'Session\Me@render')->name('me');
  Route::get('home/{username}', 'Session\Home@showProfile')->name('home');
  Route::get('client', 'Session\Client@render')->name('client');
  Route::any('settings', 'Session\Settings@render')->name('settings');
  });
Route::middleware(['auth'])->group(function () {
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
  Route::any('housekeeping/news', 'Housekeeping\News@render')->name('hknews');
});
