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

Route::group(['prefix' => 'topic'], function () {
    Route::get('/','TopicController@getIndex');
    Route::get('add','TopicController@getAdd');
    Route::post('add','TopicController@postAdd');
    Route::get('detail/{id}','TopicController@getDetail');
    Route::post('detail', 'TopicController@postDetail');
    Route::get('delete/{id}', 'TopicController@getDelete');
});

Route::group(['prefix' => 'chat'], function () {
    Route::get('/', 'ChatController@getIndex');
    Route::post('/', 'ChatController@postIndex');
    Route::get('list', 'ChatController@getList');
    Route::post('login', 'ChatController@postLogin');
    Route::post('avatar', 'ChatController@postAvatar');
});

Route::group(['prefix' => 'chats'], function () {
    Route::get('/','ChatsController@getIndex');
    Route::get('add','ChatsController@getAdd');
    Route::post('add','ChatsController@postAdd');
    Route::get('detail/{id}','ChatsController@getDetail');
    Route::post('detail', 'ChatsController@postDetail');
    Route::get('delete/{id}', 'ChatsController@getDelete');
});

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

Route::group(['prefix' => 'permissions'], function () {
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