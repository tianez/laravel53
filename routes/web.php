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

Route::get('/', 'XbhController@getIndex');
Route::get('list', 'XbhController@getIndex');
Route::get('list/{id}', 'XbhController@getList');
Route::get('show', 'XbhController@getIndex');
Route::get('show/{id}', 'XbhController@getShow');

Route::get('test', 'TestController@getIndex');
// Route::controller('test', 'TestController/getIndex');


Route::get('tk', 'CjyunController@getIndex');

require_once base_path('routes/admin.php');
require_once base_path('routes/permissions.php');
require_once base_path('routes/topic.php');
require_once base_path('routes/article.php');
require_once base_path('routes/category.php');
require_once base_path('routes/fields.php');

Route::group(['prefix' => 'tyg'], function () {
    Route::get('/', 'ReportController@getIndex');
    Route::get('list', 'ReportController@getIndex');
    Route::get('list/{id}', 'ReportController@getList');
    Route::get('show', 'ReportController@getIndex');
    Route::get('show/{id}', 'ReportController@getShow');
    Route::get('login', 'ReportController@getLogin');
    Route::post('login', 'ReportController@postLogin');
    Route::get('logout', 'ReportController@getLogout');
});

Route::group(['prefix' => 'healthy'], function () {
    Route::get('/', 'HealthyController@getIndex');
    Route::post('/', 'HealthyController@postIndex');
});

Route::group(['prefix' => 'meun'], function () {
    Route::get('/','MeunController@getIndex');
    Route::get('add','MeunController@getAdd');
    Route::post('add','MeunController@postAdd');
    Route::get('detail/{id}','MeunController@getDetail');
    Route::post('detail', 'MeunController@postDetail');
});

Route::group(['prefix' => 'roles'], function () {
    Route::get('/','RolesController@getIndex');
    Route::get('add','RolesController@getAdd');
    Route::post('add','RolesController@postAdd');
    Route::get('detail/{id}','RolesController@getDetail');
    Route::post('detail', 'RolesController@postDetail');
});

Route::group(['prefix' => 'users'], function () {
    Route::get('/','UsersController@getIndex');
    Route::get('add','UsersController@getAdd');
    Route::post('add','UsersController@postAdd');
    Route::get('detail/{id}','UsersController@getDetail');
    Route::post('detail', 'UsersController@postDetail');
});