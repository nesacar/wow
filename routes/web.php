<?php

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


Route::get('proba', 'PagesController@proba');

Auth::routes();

Route::get('/admin', function () {
    return view('layouts.admin-app');
});

// filemanager
Route::middleware('auth')->get('filemanager/show', 'FilemanagerController@index');

Route::get('/', 'PagesController@index');
Route::get('widget', 'PagesController@widget');
Route::get('{slug1}/{slug2}', 'PagesController@subCategory');
Route::get('{slug}', 'PagesController@category');