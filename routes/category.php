<?php
Route::group(['prefix' => 'article_category'], function () {
    Route::get('/','CategoryController@getIndex');
    Route::get('add','CategoryController@getAdd');
    Route::post('add','CategoryController@postAdd');
    Route::get('detail/{id}','CategoryController@getDetail');
    Route::post('detail', 'CategoryController@postDetail');
    Route::get('delete/{id}', 'CategoryController@getDelete');
});