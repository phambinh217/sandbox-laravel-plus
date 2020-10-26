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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['namespace' => 'App\Http\Controllers'], function () {
    Route::post('auth/register', 'AuthController@register')->name('auth.register');
    Route::post('auth/login', 'AuthController@login')->name('auth.login');

    Route::group(['middleware' => 'auth:sanctum'], function () {
        Route::delete('auth/logout', 'AuthController@logout')->name('auth.logout');
        Route::get('auth/user', 'AuthController@user')->name('auth.user');
    });
});
