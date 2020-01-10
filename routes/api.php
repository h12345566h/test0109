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


Route::post('/v1/user/create', 'UserController@create');
Route::post('/v1/user/delete', 'UserController@delete');
Route::post('/v1/user/change', 'UserController@change');
Route::get('/v1/user/login', 'UserController@login');
