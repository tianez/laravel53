<?php
Route::group(['prefix' => 'permissions'], function () {
    Route::get('/','PermissionsController@getIndex');
    Route::get('add','PermissionsController@getAdd');
    Route::post('add','PermissionsController@postAdd');
    Route::get('detail/{id}','PermissionsController@getDetail');
    Route::post('detail', 'PermissionsController@postDetail');
    Route::get('delete/{id}', 'PermissionsController@getDelete');
});