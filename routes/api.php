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

Route::group(['namespace' => 'App\Http\Controllers'], function () {
    Route::post('auth/register', 'AuthController@register')->name('auth.register');
    Route::post('auth/login', 'AuthController@login')->name('auth.login');

    Route::group(['middleware' => 'auth:sanctum'], function () {
        Route::get('init', 'MainController@init')->name('init');
        Route::delete('auth/logout', 'AuthController@logout')->name('auth.logout');
        Route::get('auth/user', 'AuthController@user')->name('auth.user');
        Route::put('account/password', 'AccountController@changePassword')->name('account.change-password');
        Route::put('account', 'AccountController@update')->name('account.update');
    });
});
