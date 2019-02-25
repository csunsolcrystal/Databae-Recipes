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

Route::get('/', 'PagesController@home');
Route::get('uploadrecipes', 'UploadRecipesController@uploadrecipes');
Route::get('profile', 'UserController@profile');
Route::post('profile', 'UserController@update_avatar');
Auth::routes();

Route::get('home', 'HomeController@index')->name('home');
