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

Route::get('/', "VideoRoomsController@index");

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('message/index', 'MessageController@index');
Route::get('message/send', 'MessageController@send');

Route::middleware('auth')->put('user/{user}/online', 'UserOnlineController');

Route::middleware('auth')->put('user/{user}/offline', 'UserOfflineController');

Route::prefix('room')->middleware('auth')->group(function() {
   Route::get('join/{roomName}', 'VideoRoomsController@joinRoom');
   Route::post('create', 'VideoRoomsController@createRoom');
});