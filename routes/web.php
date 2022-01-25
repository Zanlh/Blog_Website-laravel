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


// Admin User Login
Route::get('admin/login','Auth\AdminLoginController@showLoginForm');
Route::post('admin/login','Auth\AdminLoginController@login')->name('admin.login');
Route::post('admin/logout','Auth\AdminLoginController@logout')-> name('admin.logout');

// User Login
Auth::routes();
Route::middleware('auth')->namespace('Frontend')->group(function(){

    Route::get('/', 'PageController@home');

    Route::get('/profile', 'PageController@profile');
    Route::get('/profile/{id}', 'PageController@edit');
    Route::put('/profile/update/{id}','PageController@updateUserProfile');
});
