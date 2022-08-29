<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
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
    return view('login');
});




Route::controller(LoginController::class)->group(function () {
    Route::post('/login','loginUser')->name('user.login');
});

Route::controller(DashboardController::class)->group(function () {
  Route::group(['prefix'=>'admin/dashboard'], function(){
      Route::get('/','getDashbaord')->name('admin.dashboard.index');
  });
});
