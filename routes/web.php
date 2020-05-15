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

//Route::get('/', function () {
//    return view('home');
//});

Route::get('/home', 'HomeController@main_page')->name('home');
Route::get('/userpage', 'HomeController@user_page')->name('userpage');
Route::get('/', 'HomeController@main_page')->name('main_page');
//Route::get('/home', 'HomeController@group')->name('groups');
Route::get('/profile', 'ProfileController@index')->name('profile');
Route::get('/member/profile/{id}', 'ProfileController@memberProfile')->name('memberprofile');
Route::get('/friends', 'FriendController@index')->middleware('auth')->name('friends');
Route::get('/photos', 'UploadController@index')->name('photos');
Route::get('/message/{id}/create', 'MessageController@create');
Route::get('/messages', 'MessageController@index')->name('messages');
Route::post('/messages', 'MessageController@store')->name('messages');
Route::post('/messagesajax', 'MessageController@incomeMessagesAjax')->name('messagesAjax');
Route::get('/members', 'UserController@members')->name('members');
Route::get('/members/addfriend/{id}', 'UserController@sendFriendRequestTo')->name('addfriend');
Route::get('/members/removefriend/{id}', 'UserController@removeFriend')->name('remfriend');
Route::get('/friendrequests', 'UserController@friendRequests')->middleware('auth')->name('friendRequests');
Route::get('/acceptrequest/{id}', 'UserController@acceptFriendRequest')->middleware('auth')->name('acceptrequest');
Route::get('/denyrequest/{id}', 'UserController@denyFriendRequest')->middleware('auth')->name('denyrequest');

Route::get('/user_page', 'HomeController@user_page')->name('user_page');

//Route::get('/friend', 'FriendController@friend')->name('friend');
Route::get('/groups', 'GroupController@index')->name('groups');
Route::get('/groups/create', 'GroupController@create')->name('addgroup');
Route::post('/groups', 'GroupController@store')->name('groups');
Route::get('/groups/update', 'GroupController@update')->name('updategroup');
Route::get('/groups/delete/{id}', 'GroupController@delete')->name('deletegroup');
Route::get('/photo', 'UploadController@photo')->name('photo');
//Route::get('/profile', 'ProfileController@profile')->name('profile');
Route::post('/upload_file', 'UploadController@upload')->name('upload_file');
Route::post('/profile_image/{id}', 'UploadController@profile_image')->name('profile_image');


Route::delete('/delete_file/{id}', 'UploadController@delete_file')->name('delete_file');
Route::delete('/delete_profile_image/{id}', 'ProfileController@delete_profile_image')->name('delete_profile_image');


Route::post('/create_post', 'PostController@create_post')->name('create_post');
Route::post('/comment', 'CommentController@comment')->name('create_comment');
Route::post('/like', 'LikeController@like')->name('like');
Route::post('/edit_profile', 'ProfileController@edit_profile')->name('edit_profile');

Auth::routes();
