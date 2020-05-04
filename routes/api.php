<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::post('/singup', 'UserController@register');

Route::get('/user/{user}', 'UserController@show');

Route::prefix('/admin')->group(function () {
    Route::post('/privilege', 'PrivilegeController@create');
    Route::get('/privilege', 'PrivilegeController@index');

    Route::get('/users', 'UserController@index');
});
