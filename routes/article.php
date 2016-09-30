<?php
Route::group(['prefix' => 'article'], function () {
    Route::get('/','ArticleController@getIndex');
    Route::get('add','ArticleController@getAdd');
    Route::post('add','ArticleController@postAdd');
    Route::get('detail/{id}','ArticleController@getDetail');
    Route::post('detail', 'ArticleController@postDetail');
    Route::get('delete/{id}', 'ArticleController@getDelete');
});