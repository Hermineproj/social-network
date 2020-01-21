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
Route::get('/user_page', 'HomeController@user_page')->name('user_page');

Route::get('/friend', 'FriendController@friend')->name('friend');
Route::get('/group', 'HomeController@group')->name('group');
Route::get('/photo', 'UploadController@photo')->name('photo');
Route::get('/profile', 'ProfileController@profile')->name('profile');
