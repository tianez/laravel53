<?php
Route::group(['prefix' => 'config'], function () {
    Route::get('/','ConfigController@getIndex');
    Route::get('add','ConfigController@getAdd');
    Route::post('add','ConfigController@postAdd');
    Route::get('detail/{id}','ConfigController@getDetail');
    Route::post('detail', 'ConfigController@postDetail');
    Route::get('delete/{id}', 'ConfigController@getDelete');
});