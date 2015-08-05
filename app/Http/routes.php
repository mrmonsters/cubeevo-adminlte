<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'WelcomeController@index');

Route::get('home', 'HomeController@index');

// Static page routes...
Route::get('manage/page', 'PageController@index');
Route::get('manage/page/create', 'PageController@create');
Route::post('manage/page/store', 'PageController@store');

// Section routes...
Route::get('manage/section', 'SectionController@index');
Route::get('manage/section/create', 'SectionController@create');
Route::post('manage/section/store', 'SectionController@store');

// Menu routes
Route::get('manage/menu', 'MenuController@index');
Route::get('manage/menu/create', 'MenuController@create');
Route::post('manage/menu/store', 'MenuController@store');

// File routes
Route::get('manage/file', 'FileController@index');
Route::get('manage/file/create', 'FileController@create');
Route::post('manage/file/store', 'FileController@store');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);

// Authentication routes...
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

// Registration routes...
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');

// Password reset link request routes...
Route::get('password/email', 'Auth\PasswordController@getEmail');
Route::post('password/email', 'Auth\PasswordController@postEmail');

// Password reset routes...
Route::get('password/reset/{token}', 'Auth\PasswordController@getReset');
Route::post('password/reset', 'Auth\PasswordController@postReset');