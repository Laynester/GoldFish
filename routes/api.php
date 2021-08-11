<?php

use App\Http\Controllers\NitroController;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('hotel','Session\API@return');

Route::middleware('auth:api')->get('/nitro', function (Request $request) {
    $sso = Str::uuid();

    $request->user()->update([
        'auth_ticket' => $sso
    ]);

    return view('pages.nitro', [
        'sso' => $sso
    ]);
});
