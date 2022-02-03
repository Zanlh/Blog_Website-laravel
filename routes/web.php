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

    Route::get('/', 'PageController@home')->name('home');

    Route::get('/profile/{id}', 'PageController@profile')->name('profile');
    Route::get('/profile/edit/{id}', 'PageController@edit')->name('profile.edit');
    Route::put('/profile/update/{id}','PageController@updateUserProfile');

    Route::get('/update/password','PageController@updatePassword');
    Route::put('/update/password/store','PageController@updatePasswordStore');

    Route::get('/create-post','PageController@createPost');
    Route::post('/create-post/store','PageController@storePost');

    Route::get('/my-posts' ,'PageController@myPosts');
    Route::get('/my-posts/{id}' ,'PageController@myPostDetail');

    Route::get('/feed','PageController@feed');
});
