<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Tightenco\Ziggy\Ziggy;
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


Route::get('ziggy', fn () => response()->json(new Ziggy));


Route::prefix('maps')->group(function () {
    Route::get('/getProv', 'MapsController@getProv');
    Route::get('/getKab', 'MapsController@getKab');
    Route::get('/getKec', 'MapsController@getKec');
    Route::get('/getKel', 'MapsController@getKel');
});
