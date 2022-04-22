<?php

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
Route::group(['namespace' => 'Api'], function () {

    Route::group(['middleware' => ['auth:sanctum','json.response']], function() {

        Route::group(['middleware' => 'admin'], function() {

            Route::post('user/store', 'UserController@store');
            Route::post('user/delete', 'UserController@delete');
            Route::post('user/changepassword', 'UserController@changePassword');

        });

        Route::post('updateprofile', 'UserController@updateProfile');

    });

});

