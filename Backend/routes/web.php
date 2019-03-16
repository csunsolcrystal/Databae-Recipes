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
Route::get('profile', 'UserController@profile')->name('profile');
Route::post('profile', 'UserController@update_profile');

Route::get('user/ryan', 'PageController@user');

Route::get('/recipes', 'RecipesController@index')->name('recipes');
Route::get('uploadrecipes', 'RecipesController@create');
Route::post('uploadrecipes', 'RecipesController@store');
Route::get('/recipes/{recipe}', 'RecipesController@show');
Route::post('/recipes/{recipe}/replies', 'RepliesController@store');
Route::post('/recipes/{recipe}', 'RatingController@store');
Route::get('/recipes/{recipe}/edit', 'RecipesController@edit)');

Auth::routes();

Route::get('home', 'HomeController@index')->name('home');
