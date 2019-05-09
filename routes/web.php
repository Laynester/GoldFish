<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/', 'Index@render')->name('index');
Route::get('logout', ['as' => 'logout', 'uses' => 'Auth\LoginController@logout']);

Auth::routes();

Route::get('/me', 'Session\Me@render')->name('me');
Route::get('home/{username}', 'Session\Home@showProfile')->name('home');
Route::get('client', 'Session\Client@render')->name('client');

Route::get('community', 'Session\Community@render')->name('community');
Route::get('community/articles', 'Session\Articles@render')->name('articles');
Route::get('community/articles/{id}', 'Session\Articles@renderNews')->name('articles');
Route::get('community/staff', 'Session\Staff@render')->name('staff');
Route::get('community/leaderboards', 'Session\Leaderboards@render')->name('leaderboards');
