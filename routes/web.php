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
    Route::get('/', fn () => redirect('admin/login'));
    Route::post('/login', 'Admin\AuthController@login');
    Route::get('/login', 'Admin\AuthController@index')->name('admin.login');
    Route::get('/logout', 'Admin\AuthController@logout')->withoutMiddleware('guest')->name('admin.logout');
    Route::get('/dashboard', fn () => inertia('dashboard'))->name('admin.dashboard')->middleware(['role:admin', 'auth'])->withoutMiddleware('guest');
});


Route::prefix('admin/master')->middleware(['role:admin', 'auth'])->group(function () {
    Route::resource('/menu', 'Admin\MenuController');
    Route::resource('/role', 'Admin\RoleController');
    Route::resource('/admin', 'Admin\AdminController');
    Route::resource('/anggota', 'Admin\AnggotaController');
    Route::resource('/permission', 'Admin\PermissionController');
});
