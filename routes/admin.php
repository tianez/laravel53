<?php
Route::group(['prefix' => 'admin'], function () { 
    Route::get('/','Admin\AdminController@getIndex');
    Route::post('login', 'Admin\AdminController@postLogin');
    Route::get('logout', 'Admin\AdminController@getLogout');
    Route::get('user','Admin\AdminController@getUser');
    Route::get('meun','Admin\AdminController@getMeun');
    Route::get('roles','Admin\InfoController@getRolesGroup');
    Route::get('permts','Admin\InfoController@getPermtsGroup');
    Route::get('category','Admin\InfoController@getCategory');
    Route::get('tags','Admin\InfoController@getTags');
    Route::post('import','Admin\AdminController@postImport');
});