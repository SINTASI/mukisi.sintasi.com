<?php

use Inertia\Inertia;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('users.landing');
});

Route::resource('/pendaftaran', 'PendaftaranController');


Route::prefix('admin')->middleware('guest')->group(function () {
    Route::get('/', function () {
        return redirect('admin/login');
    });

    Route::get('/dashboard', function () {
        return inertia('dashboard');
    })->name('admin.dashboard')->withoutMiddleware('guest')->middleware('auth');

    Route::get('/login', 'Admin\AuthController@index')->name('admin.login');
    Route::post('/login', 'Admin\AuthController@login');

    Route::get('/logout', 'Admin\AuthController@logout')
        ->withoutMiddleware('guest')
        ->name('admin.logout');
});
