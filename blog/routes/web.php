<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
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

Route::controller(LoginController::class)->group(function () {
    Route::get('/','login')->name('login')->middleware('guest');
    Route::post('/login','loginUser')->name('user.login');
});
Route::group(['prefix'=>'admin'], function(){
  Route::group(['prefix'=>'dashboard'], function(){
    // Dashboard
    Route::controller(DashboardController::class)->group(function () {
        Route::get('/','getDashbaord')->name('admin.dashboard.index');
    });

    Route::group(['prefix'=>'users'], function(){
      // Dashboard
      Route::controller(UserController::class)->group(function () {
          Route::get('/','getUsers')->name('admin.dashboard.users.index');
          Route::get('/create','createUser')->name('admin.dashboard.users.create');
          Route::post('/store','storeUser')->name('admin.dashboard.users.store');
          Route::get('/edit/{id}','editUser')->name('admin.dashboard.users.edit');
          Route::post('/update/{id}','updateUser')->name('admin.dashboard.users.update');
          Route::get('/delete/{id}','deleteUser')->name('admin.dashboard.users.delete');
          Route::get('/logout','logout')->name('admin.dashboard.users.logout');
      });
    });
  });
});
