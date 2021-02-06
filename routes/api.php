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

        // category_news
        Route::get('/category_news', 'CategoryNewsController@index');
        Route::get('/category_news/all_category_news', 'CategoryNewsController@all');
        Route::post('/category_news', 'CategoryNewsController@store');
        Route::get('/category_news/delete/{id}', 'CategoryNewsController@destroy');
        Route::get('/category_news/{id}', 'CategoryNewsController@show');
        Route::post('/category_news/{id}', 'CategoryNewsController@update');

        // category_album
        Route::get('/category_album', 'CategoryAlbumController@index');
        Route::get('/category_album/all_category_album', 'CategoryAlbumController@all');
        Route::post('/category_album', 'CategoryAlbumController@store');
        Route::get('/category_album/delete/{id}', 'CategoryAlbumController@destroy');
        Route::get('/category_album/{id}', 'CategoryAlbumController@show');
        Route::post('/category_album/{id}', 'CategoryAlbumController@update');

        // news
        Route::get('/news', 'NewsController@index');
        Route::get('/news/all_news', 'NewsController@all');
        Route::post('/news', 'NewsController@store');
        Route::get('/news/delete/{id}', 'NewsController@destroy');
        Route::get('/news/{id}', 'NewsController@show');
        Route::post('/news/{id}', 'NewsController@update');

        // school
        Route::get('/schools', 'SchoolController@index');
        Route::get('/schools/all_school', 'SchoolController@all');
        Route::post('/schools', 'SchoolController@store');
        Route::get('/schools/delete/{id}', 'SchoolController@destroy');
        Route::get('/schools/{id}', 'SchoolController@show');
        Route::post('/schools/{id}', 'SchoolController@update');

        // user profile
        Route::get('/user/show_profile', 'UserController@showProfile');
        Route::post('/user/edit_profile', 'UserController@editProfile');
        Route::post('/user/change_password_profile', 'UserController@changePasswordProfile');
    });
});
