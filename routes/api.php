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

Route::group(['namespace' => 'Api'], function () {
    Route::post('/auth/register', 'AuthController@register');
    Route::post('/auth/login', 'AuthController@login');
    Route::post('/auth/logout', 'AuthController@logout');

    Route::group(['middleware' => 'jwt.auth',], function () {
        // user
        Route::get('/user/list', 'UserController@getList');
        Route::get('/user/delete/{id}', 'UserController@delete');
        Route::get('/user/info', 'UserController@showProfile');

        // banner
        Route::get('/banners', 'BannerController@index');
        Route::get('/banners/all_banner', 'BannerController@all');
        Route::post('/banners', 'BannerController@store');
        Route::get('/banners/delete/{id}', 'BannerController@destroy');
        Route::get('/banners/{id}', 'BannerController@show');
        Route::post('/banners/{id}', 'BannerController@update');

        // user profile
        Route::get('/user/show_profile', 'UserController@showProfile');
        Route::post('/user/edit_profile', 'UserController@editProfile');
        Route::post('/user/change_password_profile', 'UserController@changePasswordProfile');
    });
});
