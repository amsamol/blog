<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SubCategoryController;
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
          Route::get('/profile/{id}','profileUser')->name('admin.dashboard.users.profile');
          Route::post('/profile/{id}','updateProfile')->name('admin.dashboard.users.profile.update');
          Route::get('/logout','logout')->name('admin.dashboard.users.logout');
      });
    });

    Route::group(['prefix'=>'categories'], function(){
      // Dashboard
      Route::controller(CategoryController::class)->group(function () {
          Route::get('/','getCategories')->name('admin.dashboard.categories.index');
          Route::get('/create','createCategory')->name('admin.dashboard.categories.create');
          Route::post('/store','storeCategory')->name('admin.dashboard.categories.store');
          Route::get('/{id}/edit','editCategory')->name('admin.dashboard.categories.edit');
          Route::post('/{id}/update','updateCategory')->name('admin.dashboard.categories.update');
          Route::get('/{id}/delete','deleteCategory')->name('admin.dashboard.categories.delete');
      });
    });

    Route::group(['prefix'=>'subcategories'], function(){
      // Dashboard
      Route::controller(SubCategoryController::class)->group(function () {
          Route::get('/','getSubCategories')->name('admin.dashboard.subcategories.index');
          Route::get('/create','createSubCategory')->name('admin.dashboard.subcategories.create');
          Route::post('/store','storeSubCategory')->name('admin.dashboard.subcategories.store');
          Route::get('/{id}/edit','editSubCategory')->name('admin.dashboard.subcategories.edit');
          Route::post('/{id}/update','updateSubCategory')->name('admin.dashboard.subcategories.update');
          Route::get('/{id}/delete','deleteSubCategory')->name('admin.dashboard.subcategories.delete');
      });
    });
  });
});
