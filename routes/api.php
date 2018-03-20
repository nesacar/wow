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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware('auth:api')->get('users/logout', 'UsersController@logout');
Route::middleware('auth:api')->get('users/get-users', 'UsersController@getUsers');
Route::middleware('auth:api')->post('users/change-password', 'UsersController@changePassword');
Route::middleware('auth:api')->resource('users', 'UsersController');
Route::middleware('auth:api')->post('users/{id}/image', 'UsersController@uploadImage');

Route::middleware('auth:api')->get('categories/lists', 'CategoriesController@lists');
Route::middleware('auth:api')->resource('categories', 'CategoriesController');
Route::middleware('auth:api')->post('categories/{id}/image', 'CategoriesController@uploadImage');

Route::middleware('auth:api')->post('posts/search', 'PostsController@search');
Route::middleware('auth:api')->resource('posts', 'PostsController');
Route::middleware('auth:api')->post('posts/{id}/image', 'PostsController@uploadImage');
Route::middleware('auth:api')->post('posts/{id}/pdf', 'PostsController@uploadPdf');
Route::middleware('auth:api')->post('posts/{id}/gallery', 'PostsController@galleryUpdate');
Route::middleware('auth:api')->get('posts/{id}/gallery', 'PostsController@gallery');

Route::middleware('auth:api')->post('photos/{id}/destroy', 'PhotosController@destroy');

Route::middleware('auth:api')->get('settings/{id}/edit', 'SettingsController@edit');
Route::middleware('auth:api')->patch('settings/{id}/update', 'SettingsController@update');
Route::middleware('auth:api')->post('settings/{id}/updateLang', 'SettingsController@updateLang');

Route::middleware('auth:api')->resource('themes', 'ThemesController');
Route::middleware('auth:api')->post('themes/{id}/image', 'ThemesController@uploadImage');

Route::middleware('auth:api')->resource('galleries', 'GalleriesController');
Route::middleware('auth:api')->get('galleries/{id}/images', 'GalleriesController@image');
Route::middleware('auth:api')->post('galleries/{id}/images', 'GalleriesController@imageUpdate');

Route::middleware('auth:api')->post('images/{id}/destroy', 'ImagesController@destroy');

Route::middleware('auth:api')->resource('subscribers', 'SubscribersController');

Route::middleware('auth:api')->resource('banners', 'BannersController');
Route::middleware('auth:api')->post('banners/{id}/image', 'BannersController@uploadImage');