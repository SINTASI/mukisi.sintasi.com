<?php

use App\Models\Map;
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

Route::get('/', fn () => view('users.landing'));

Route::resource('/pendaftaran', 'PendaftaranController');


Route::prefix('admin')->middleware(['role:admin', 'auth'])->group(function () {
    Route::get('/', fn () => redirect('admin/login'))->middleware('guest')->withoutMiddleware(['role:admin', 'auth']);
    Route::post('/login', 'Admin\AuthController@login')->middleware('guest')->withoutMiddleware(['role:admin', 'auth']);
    Route::get('/login', 'Admin\AuthController@index')->name('admin.login')
        ->middleware('guest')->withoutMiddleware(['role:admin', 'auth']);

    Route::get('/logout', 'Admin\AuthController@logout')->name('admin.logout');

    Route::get('/dashboard', fn () => inertia('dashboard'))->name('admin.dashboard');


    Route::post('/posts/uploadFile', 'Admin\PostsController@uploadFile');
    Route::get('/posts/fetchUrl', 'Admin\PostsController@fetchUrl');
    Route::resources([
        'posts' => 'Admin\PostsController',
        'slider' => 'Admin\SliderController',
        'anggota' => 'Admin\AnggotaController',
        'setting' => 'Admin\SettingContrroler',
    ]);
});


Route::prefix('admin/master')->middleware(['role:admin', 'auth'])->group(function () {
    Route::post('/menu/drop-down', 'Admin\Master\MenuController@dropDown');

    Route::resources([
        'menu' => 'Admin\Master\MenuController',
        'role' => 'Admin\Master\RoleController',
        'admin' => 'Admin\Master\AdminController',
        'anggota' => 'Admin\Master\AnggotaController',
        'permission' => 'Admin\Master\PermissionController',
    ]);
});
