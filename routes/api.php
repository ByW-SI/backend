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

Route::middleware('auth:api')->get('/user','User\UserController@getUser');
Route::middleware('auth:api')->post('/password','User\UserController@changePassword');

Route::resource('users', 'User\UserController', ['except'=>['create', 'edit']]);

Route::post('login', 'User\UserController@login')->name('login');
