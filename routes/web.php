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
Route::get('/main_page', 'HomeController@main_page')->name('main_page');
//Route::get('/home', 'HomeController@group')->name('groups');
Route::get('/profile', 'ProfileController@index')->name('profile');
Route::get('/friends', 'FriendController@index')->middleware('auth')->name('friends');
Route::get('/photos', 'UploadController@index')->name('photos');
Route::get('/message/{id}/create', 'MessageController@create');
Route::post('/message', 'MessageController@store');
Route::get('/messages', 'MessageController@index')->name('messages');
Route::get('/members', 'UserController@members')->name('members');

Route::get('/user_page', 'HomeController@user_page')->name('user_page');

Route::get('/friend', 'FriendController@friend')->name('friend');
Route::get('/group', 'HomeController@group')->name('group');
Route::get('/photo', 'UploadController@photo')->name('photo');
Route::get('/profile', 'ProfileController@profile')->name('profile');
Route::post('/upload_file', 'UploadController@upload')->name('upload_file');
Route::post('/profile_image/{id}', 'UploadController@profile_image')->name('profile_image');


Route::delete('/delete_file/{id}', 'UploadController@delete_file')->name('delete_file');
Route::delete('/delete_profile_image/{id}', 'ProfileController@delete_profile_image')->name('delete_profile_image');


Route::post('/create_post', 'PostController@create_post')->name('create_post');
Route::post('/comment', 'CommentController@comment')->name('create_comment');
Route::post('/like', 'LikeController@like')->name('like');
Route::post('/edit_profile', 'ProfileController@edit_profile')->name('edit_profile');

