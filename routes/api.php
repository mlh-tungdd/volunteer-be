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

    Route::get('/districts', 'DistrictController@index');
    Route::get('/districts/all_district', 'DistrictController@all');

    Route::get('/banners', 'BannerController@index');
    Route::get('/banners/all_banner', 'BannerController@all');

    Route::get('/category_news', 'CategoryNewsController@index');
    Route::get('/category_news/all_category_news', 'CategoryNewsController@all');
    Route::get('/category_news/{id}', 'CategoryNewsController@show');

    Route::get('/news', 'NewsController@index');
    Route::get('/news/all_news', 'NewsController@all');
    Route::get('/news/{id}', 'NewsController@show');
    Route::get('/news/get_list_recent/{id}', 'NewsController@getListNewsRecent');
    Route::get('/news/get_list_by_category_id/{id}', 'NewsController@getListNewsByCategoryId');

    Route::get('/schools', 'SchoolController@index');
    Route::get('/schools/all_school', 'SchoolController@all');
    Route::get('/schools/{id}', 'SchoolController@show');
    Route::get('/schools/get_list_by_district_id/{id}', 'SchoolController@getListSchoolByDistrictId');

    Route::group(['middleware' => 'jwt.auth',], function () {
        // user
        Route::get('/user/list', 'UserController@getList');
        Route::get('/user/delete/{id}', 'UserController@delete');
        Route::get('/user/info', 'UserController@showProfile');

        // banner
        Route::post('/banners', 'BannerController@store');
        Route::get('/banners/delete/{id}', 'BannerController@destroy');
        Route::get('/banners/{id}', 'BannerController@show');
        Route::post('/banners/{id}', 'BannerController@update');

        // category_news
        Route::post('/category_news', 'CategoryNewsController@store');
        Route::get('/category_news/delete/{id}', 'CategoryNewsController@destroy');
        Route::post('/category_news/{id}', 'CategoryNewsController@update');

        // category_album
        Route::get('/category_album', 'CategoryAlbumController@index');
        Route::get('/category_album/all_category_album', 'CategoryAlbumController@all');
        Route::post('/category_album', 'CategoryAlbumController@store');
        Route::get('/category_album/delete/{id}', 'CategoryAlbumController@destroy');
        Route::get('/category_album/{id}', 'CategoryAlbumController@show');
        Route::post('/category_album/{id}', 'CategoryAlbumController@update');

        // news
        Route::post('/news', 'NewsController@store');
        Route::get('/news/delete/{id}', 'NewsController@destroy');
        Route::post('/news/{id}', 'NewsController@update');

        // school
        Route::post('/schools', 'SchoolController@store');
        Route::get('/schools/delete/{id}', 'SchoolController@destroy');
        Route::post('/schools/{id}', 'SchoolController@update');

        // albums
        Route::get('/albums', 'AlbumController@index');
        Route::get('/albums/all_album', 'AlbumController@all');
        Route::post('/albums', 'AlbumController@store');
        Route::get('/albums/delete/{id}', 'AlbumController@destroy');
        Route::get('/albums/{id}', 'AlbumController@show');
        Route::post('/albums/{id}', 'AlbumController@update');

        // video
        Route::get('/videos', 'VideoController@index');
        Route::get('/videos/all_video', 'VideoController@all');
        Route::post('/videos', 'VideoController@store');
        Route::get('/videos/delete/{id}', 'VideoController@destroy');
        Route::get('/videos/{id}', 'VideoController@show');
        Route::post('/videos/{id}', 'VideoController@update');

        // district
        Route::post('/districts', 'DistrictController@store');
        Route::get('/districts/delete/{id}', 'DistrictController@destroy');
        Route::get('/districts/{id}', 'DistrictController@show');
        Route::post('/districts/{id}', 'DistrictController@update');

        // event
        Route::get('/events', 'EventController@index');
        Route::get('/events/all_event', 'EventController@all');
        Route::post('/events', 'EventController@store');
        Route::get('/events/delete/{id}', 'EventController@destroy');
        Route::get('/events/{id}', 'EventController@show');
        Route::post('/events/{id}', 'EventController@update');

        // user profile
        Route::get('/user/show_profile', 'UserController@showProfile');
        Route::post('/user/edit_profile', 'UserController@editProfile');
        Route::post('/user/change_password_profile', 'UserController@changePasswordProfile');
    });
});
