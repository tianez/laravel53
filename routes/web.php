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

Route::get('/', 'HomeController@index');
Route::post('/', 'HomeController@index_post');

Route::group(['prefix' => 'admin'], function () {
    Route::get('/','AdminController@getIndex');
    Route::get('user','AdminController@getUser');
    Route::get('meun','AdminController@getMeun');
    Route::get('list','AdminController@getList');
    Route::get('detail','AdminController@getDetail');
    Route::post('detail', 'AdminController@postDetail');
    Route::post('login', 'AdminController@postLogin');
    Route::post('import','AdminController@postImport');
});


// Route::controller('test', 'TestController/getIndex');