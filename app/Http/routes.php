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

Route::controllers([
	'admin/manage/post' => 'Admin\PostController',
]);
 
Route::get('/credential', 'HomeController@getCredential');
Route::get('/credential/project/{slug}', 'HomeController@getProjectContent');
Route::get('/credential/{slug}', 'HomeController@getCredentialProject'); 
Route::get('/solution', 'HomeController@getSolution'); 
Route::get('/locale/{code}', 'HomeController@switchLocale');
Route::get('/contact-us', 'HomeController@getContactUs');
Route::get('/insights/detail/{slug}', 'HomeController@getInsightdetail');
Route::get('/insights', 'HomeController@getInsights');
Route::get('/homepage', 'HomeController@getHomepage');

Route::post('/contact-us/submit', 'HomeController@submitMessage');

Route::get('admin', 'AdminController@index');

// page routes...
Route::get('admin/manage/page', 'PageController@index');
Route::get('admin/manage/page/create', 'PageController@create');
Route::get('admin/manage/page/edit/{page_id}', 'PageController@edit');
Route::put('manage/page/update/{page_id}', 'PageController@update');
Route::post('manage/page/store', 'PageController@store');
Route::get('admin/manage/page/setActive/{page_id}', 'PageController@setActive');
Route::get('admin/manage/page/setInactive/{page_id}', 'PageController@setInactive');
Route::get('admin/manage/page/destroy/{page_id}', 'PageController@destroy');

// File routes
Route::get('admin/manage/file', 'FileController@index');
Route::get('admin/manage/file/create', 'FileController@create');
Route::get('admin/manage/file/show/{file_id}', 'FileController@show');
Route::get('admin/manage/file/setActive/{file_id}', 'FileController@setActive');
Route::get('admin/manage/file/setInactive/{file_id}', 'FileController@setInactive');
Route::get('admin/manage/file/destroy/{file_id}', 'FileController@destroy');
Route::post('manage/file/store', 'FileController@store');

// Contact us routes
Route::get('admin/manage/message', 'MessageController@index');
Route::get('admin/manage/message/show/{msg_id}', 'MessageController@show');
Route::get('admin/manage/message/setActive/{msg_id}', 'MessageController@setActive');
Route::get('admin/manage/message/setInactive/{msg_id}', 'MessageController@setInactive');
Route::get('admin/manage/message/destroy/{msg_id}', 'MessageController@destroy');

// Category routes...
Route::get('admin/manage/category', 'CategoryController@index');
Route::get('admin/manage/category/create', 'CategoryController@create');
Route::get('admin/manage/category/edit/{category_id}', 'CategoryController@edit');
Route::put('manage/category/update/{category_id}', 'CategoryController@update');
Route::post('manage/category/store', 'CategoryController@store');
Route::get('admin/manage/category/setActive/{category_id}', 'CategoryController@setActive');
Route::get('admin/manage/category/setInactive/{category_id}', 'CategoryController@setInactive');
Route::get('admin/manage/category/destroy/{category_id}', 'CategoryController@destroy');

// Project routes...
Route::get('admin/manage/project', 'ProjectController@index');
Route::get('admin/manage/project/create', 'ProjectController@create');
Route::get('admin/manage/project/edit/{project_id}', 'ProjectController@edit');
Route::put('manage/project/update/{project_id}', 'ProjectController@update');
Route::post('manage/project/store', 'ProjectController@store');
Route::get('admin/manage/project/setActive/{project_id}', 'ProjectController@setActive');
Route::get('admin/manage/project/setInactive/{project_id}', 'ProjectController@setInactive');
Route::get('admin/manage/project/destroy/{project_id}', 'ProjectController@destroy');

// Solution routes...
Route::get('admin/manage/solution', 'SolutionController@index');
Route::get('admin/manage/solution/create', 'SolutionController@create');
Route::get('admin/manage/solution/edit/{block_id}', 'SolutionController@edit');
Route::put('manage/solution/update/{block_id}', 'SolutionController@update');
Route::post('manage/solution/store', 'SolutionController@store');
Route::get('admin/manage/solution/setActive/{solution_id}', 'SolutionController@setActive');
Route::get('admin/manage/solution/setInactive/{solution_id}', 'SolutionController@setInactive');
Route::get('admin/manage/solution/destroy/{solution_id}', 'SolutionController@destroy');

// Job routes...
Route::get('admin/manage/job', 'JobController@index');
Route::get('admin/manage/job/create', 'JobController@create');
Route::get('admin/manage/job/edit/{job_id}', 'JobController@edit');
Route::put('manage/job/update/{job_id}', 'JobController@update');
Route::post('manage/job/store', 'JobController@store');
Route::get('admin/manage/job/setActive/{job_id}', 'JobController@setActive');
Route::get('admin/manage/job/setInactive/{job_id}', 'JobController@setInactive');
Route::get('admin/manage/job/destroy/{job_id}', 'JobController@destroy');

// Profile routes...
Route::get('admin/manage/profile', 'ProfileController@index');
Route::get('admin/manage/profile/create', 'ProfileController@create');
Route::get('admin/manage/profile/edit/{profile_id}', 'ProfileController@edit');
Route::put('manage/profile/update/{profile_id}', 'ProfileController@update');
Route::post('manage/profile/store', 'ProfileController@store');
Route::get('admin/manage/profile/setActive/{profile_id}', 'ProfileController@setActive');
Route::get('admin/manage/profile/setInactive/{profile_id}', 'ProfileController@setInactive');
Route::get('admin/manage/profile/destroy/{profile_id}', 'ProfileController@destroy');

// Setting routes...
Route::get('admin/manage/setting', 'SettingController@edit');
Route::put('manage/setting/update/', 'SettingController@update');

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

/*if no matching router , all goes to here*/
Route::any('{all}','HomeController@getStaticPages')->where('all', '.*');