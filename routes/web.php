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

Auth::routes();

Route::get('/home', 'Session\Home@render')->name('home');
Route::get('client', 'Session\Client@render')->name('client');
