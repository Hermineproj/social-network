<?php

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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/userpage', 'HomeController@user_page')->name('userpage');
Route::get('/home', 'HomeController@group')->name('groups');
Route::get('/profile', 'ProfileController@index')->name('profile');
Route::get('/friends', 'FriendController@index')->name('friends');
Route::get('/photos', 'UploadController@index')->name('photos');


