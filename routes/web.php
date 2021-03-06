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

//authenticated user id
Route::get('authUserId','AwaydayController@authUserId');

Route::get('/home', 'HomeController@index')->name('home');
Route::get('login/github', 'Auth\LoginController@redirectToProvider');
Route::get('login/github/callback', 'Auth\LoginController@handleProviderCallback');

Route::get('login/google', 'Auth\LoginController@redirectToGoogle');
Route::get('login/google/callback', 'Auth\LoginController@handleGoogleCallback');

//event broadcast
Route::get('event','HomeController@event');
// Route::get('listen',function(){
// 	return view('listenBroadcast'); 
// });

Route::get('awaydays', 'AwaydayController@index')->name('awaydays');
Route::get('awaydays/{id}', 'AwaydayController@show')->name('awaydays-show');

//resource
Route::get('rsc/showAwaydayData', 'AwaydayController@showAwaydayData')->name('show-awayday-data');
Route::get('rsc/getAwaydayTimeline', 'AwaydayController@getAwaydayTimeline')->name('get-awayday-timeline');
Route::post('rsc/saveAwaydayData', 'AwaydayController@saveAwaydayData')->name('save-awayday-data');
Route::post('rsc/checkIsDaftar', 'AwaydayController@checkIsDaftar')->name('check-is-daftar');
Route::get('rsc/getAwaydayDetail/{slug}', 'AwaydayController@getAwaydayDetail')->name('get-awayday-detail');


