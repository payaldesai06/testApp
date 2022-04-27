<?php

use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get("/", function(){
    return View::make("auth.login");
});

Route::get("/login", function(){
    return View::make("auth.login");
})->name('login');

Route::get("/register", function(){
    return View::make("auth.register");
})->name('register');

Route::group(['middleware' => ['auth']], function () {

    Route::get('home', 'DashboardController@index')->name('dashboard');
    Route::get('settings', 'DashboardController@settings')->name('settings');

    Route::get('logout', 'UserController@logout')->name('logout');

    Route::group(['middleware' => 'admin'], function () {

        Route::get('users', 'UserController@index')->name('user');
        Route::get('user/list', 'UserController@getData')->name('user.list');
        Route::get('user/add', 'UserController@add')->name('user.add');
        Route::get('user/edit', 'UserController@edit')->name('user.edit');

    });
});
