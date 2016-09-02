<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', 'HomeController@getIndex');
Route::post('/', 'HomeController@postIndex');
Route::get('react', 'HomeController@getReact');
Route::get('logout', 'HomeController@getLogout');

Route::group(['prefix' => 'admin'], function () {
    Route::get('/','AdminController@getIndex');
    Route::get('user','AdminController@getUser');
    Route::get('meun','AdminController@getMeun');
    Route::get('list','AdminController@getList');
    Route::get('add','AdminController@getAdd');
    Route::post('add','AdminController@postAdd');
    Route::get('detail','AdminController@getDetail');
    Route::post('detail', 'AdminController@postDetail');
    Route::post('login', 'AdminController@postLogin');
    Route::get('logout', 'AdminController@getLogout');
    Route::post('import','AdminController@postImport');
    Route::get('roles','Admin\InfoController@getRolesGroup');
    Route::get('permts','Admin\InfoController@getPermtsGroup');
});
Route::group(['prefix' => 'article'], function () {
    Route::get('add','ArticleController@getAdd');
    Route::post('add','ArticleController@postAdd');
    Route::get('detail','ArticleController@getDetail');
    Route::post('detail', 'ArticleController@postDetail');
});

Route::get('test', 'TestController@getIndex');
// Route::controller('test', 'TestController/getIndex');