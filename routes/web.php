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

Route::get('/', 'ReportController@getIndex');
Route::get('list', 'ReportController@getIndex');
Route::get('list/{id}', 'ReportController@getList');
Route::get('show', 'ReportController@getIndex');
Route::get('show/{id}', 'ReportController@getShow');
Route::get('login', 'ReportController@getLogin');
Route::post('login', 'ReportController@postLogin');
Route::get('logout', 'ReportController@getLogout');

Route::group(['prefix' => 'healthy'], function () {
    Route::get('/', 'HealthyController@getIndex');
    Route::post('/', 'HealthyController@postIndex');
});

Route::group(['prefix' => 'hy'], function () {
    Route::get('/','ArticleController@getIndex');
    Route::get('add','ArticleController@getAdd');
    Route::post('add','ArticleController@postAdd');
    Route::get('detail/{id}','ArticleController@getDetail');
    Route::post('detail', 'ArticleController@postDetail');
});


Route::group(['prefix' => 'admin'], function () {
    Route::get('/','AdminController@getIndex');
    Route::get('user','AdminController@getUser');
    Route::get('meun','AdminController@getMeun');
    Route::post('login', 'AdminController@postLogin');
    Route::get('logout', 'AdminController@getLogout');
    Route::post('import','AdminController@postImport');
    Route::get('roles','Admin\InfoController@getRolesGroup');
    Route::get('permts','Admin\InfoController@getPermtsGroup');
    Route::get('category','Admin\InfoController@getCategory');
    Route::get('tags','Admin\InfoController@getTags');
});
Route::group(['prefix' => 'article'], function () {
    Route::get('/','ArticleController@getIndex');
    Route::get('add','ArticleController@getAdd');
    Route::post('add','ArticleController@postAdd');
    Route::get('detail/{id}','ArticleController@getDetail');
    Route::post('detail', 'ArticleController@postDetail');
    Route::get('delete/{id}', 'ArticleController@getDelete');
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

Route::group(['prefix' => 'role_permissions'], function () {
    Route::get('/','PermissionsController@getIndex');
    Route::get('add','PermissionsController@getAdd');
    Route::post('add','PermissionsController@postAdd');
    Route::get('detail/{id}','PermissionsController@getDetail');
    Route::post('detail', 'PermissionsController@postDetail');
    Route::get('delete/{id}', 'PermissionsController@getDelete');
});

Route::group(['prefix' => 'article_category'], function () {
    Route::get('/','CategoryController@getIndex');
    Route::get('add','CategoryController@getAdd');
    Route::post('add','CategoryController@postAdd');
    Route::get('detail/{id}','CategoryController@getDetail');
    Route::post('detail', 'CategoryController@postDetail');
    Route::get('delete/{id}', 'CategoryController@getDelete');
});

Route::group(['prefix' => 'fields'], function () {
    Route::get('/','FieldsController@getIndex');
    Route::get('add','FieldsController@getAdd');
    Route::post('add','FieldsController@postAdd');
    Route::get('detail/{id}','FieldsController@getDetail');
    Route::post('detail', 'FieldsController@postDetail');
});

Route::group(['prefix' => 'users'], function () {
    Route::get('/','UsersController@getIndex');
    Route::get('add','UsersController@getAdd');
    Route::post('add','UsersController@postAdd');
    Route::get('detail/{id}','UsersController@getDetail');
    Route::post('detail', 'UsersController@postDetail');
});


Route::get('test', 'TestController@getIndex');
Route::post('uploads', 'TestController@upload');
// Route::controller('test', 'TestController/getIndex');