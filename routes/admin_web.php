<?php

use Illuminate\Support\Facades\Auth;
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


Route::prefix('admin')->name('admin.')->middleware('auth:admin_user')->namespace('Backend')->group(function(){
    Route::get('/','PageController@home')->name('home');

    Route::resource('admin-user','AdminUserController');
    Route::get('admin-user/datatable/ssd','AdminUserController@ssd');
    
    Route::resource('user','UserController');
    Route::get('user/datatable/ssd','UserController@ssd');
    
    Route::resource('category','CategoryController');
    Route::get('category/datatable/ssd','CategoryController@ssd');
    
    Route::get('post','PostController@index');
    Route::get('post/datatable/ssd','PostController@ssd');

    Route::get('profile/{id}','AdminUserController@profile')->name('profile');
    Route::put('profile/update/{id}','AdminUserController@updateProfile');
});
