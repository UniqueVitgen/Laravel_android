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

//Route::get('/', function () {
//    return view('post.index');
//});

Route::get('/', ['as' => 'posts', 'uses' => 'PostController@index']);
Route::get('unpublished', ['as' => 'posts.unpublished', 'uses' => 'PostController@unpublished']);
Route::post('login', array('as' => 'login', 'uses' => 'Auth\AuthController@doLogin'));
Route::get('logout', array('as' => 'logout', 'uses' => 'Auth\AuthController@getLogout'));

Route::get('/uploadfile','UploadFileController@index');
Route::get('/getimage/get/{filename}',['as' =>'getimage', 'uses' =>'UploadFileController@get']);
Route::post('/uploadfilepost',array('as' => 'uploadfile.store', 'uses' => 'UploadFileController@store'));
//
//Route::get('post/create', ['as' => 'post.create', 'uses' => 'PostController@create']);
//Route::post('post', ['as' => 'post.store', 'uses' => 'PostController@store']);
//Route::get('post/{post}', ['as' => 'post.show', 'uses' => 'PostController@show']);
//Route::get('post/{post}', ['as' => 'post.edit', 'uses' => 'PostController@edit']);
//Route::post('post/{post}', ['as' => 'post.update', 'uses' => 'PostController@update']);


$router->resource('post', 'PostController');
$router->resource('auth', 'Auth\AuthController');
$router->resource('register', 'Auth\RegisterController');
$router->resource('job', 'User\JobController');
$router->resource('android', 'User\AndroidController');
$router->resource('skill', 'User\SkillController');