<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

//list user
Route::get('users','Api\UserController@index');

//list single user
Route::get('user/{id}','Api\UserController@show');

//create new user
Route::post('user','Api\UserController@store');

//update user
Route::put('user','Api\UserController@store');

//delete
Route::delete('user/{id}','Api\UserController@destroy');

//show total user
Route::get('user/show/total-user','Api\UserController@showTotalUser');

//list awayday
Route::get('awaydays','Api\AwaydayController@index');
//list single awayday
Route::get('awayday/{slug}','Api\AwaydayController@show');
//create new awayday
Route::post('awayday','Api\AwaydayController@store');