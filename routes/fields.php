<?php
Route::group(['prefix' => 'fields'], function () {
    Route::get('/','FieldsController@getIndex');
    Route::get('add','FieldsController@getAdd');
    Route::post('add','FieldsController@postAdd');
    Route::get('detail/{id}','FieldsController@getDetail');
    Route::post('detail', 'FieldsController@postDetail');
    Route::get('delete/{id}', 'FieldsController@getDelete');
});