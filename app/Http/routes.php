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

Route::get('/', 'HomeController@index');
Route::get('/about-us', 'HomeController@getAboutUs');
Route::get('/credential', 'HomeController@getCredential');
Route::get('/credential/content', 'HomeController@getCredentialContent');
Route::get('/solution', 'HomeController@getSolution');
Route::get('/research', 'HomeController@getResearch');
Route::get('/process', 'HomeController@getProcess');
Route::get('/contact-us', 'HomeController@getContactUs');

Route::get('admin', 'AdminController@index');

// Static page routes...
Route::get('admin/manage/page', 'PageController@index');
Route::get('admin/manage/page/create', 'PageController@create');
Route::get('admin/manage/page/edit/{page_id}', 'PageController@edit');
Route::put('manage/page/update/{page_id}', 'PageController@update');
Route::post('manage/page/store', 'PageController@store');

// Section routes...
Route::get('admin/manage/section', 'SectionController@index');
Route::get('admin/manage/section/create', 'SectionController@create');
Route::get('admin/manage/section/edit/{section_id}', 'SectionController@edit');
Route::put('manage/section/update/{section_id}', 'SectionController@update');
Route::post('manage/section/store', 'SectionController@store');

// Menu routes
Route::get('admin/manage/menu', 'MenuController@index');
Route::get('admin/manage/menu/create', 'MenuController@create');
Route::get('admin/manage/menu/edit/{menu_id}', 'MenuController@edit');
Route::put('manage/menu/update/{menu_id}', 'MenuController@update');
Route::post('manage/menu/store', 'MenuController@store');

// File routes
Route::get('admin/manage/file', 'FileController@index');
Route::get('admin/manage/file/create', 'FileController@create');
Route::get('admin/manage/file/edit/{file_id}', 'FileController@edit');
Route::put('manage/file/update/{file_id}', 'FileController@update');
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