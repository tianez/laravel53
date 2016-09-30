<?php 
Route::group(['prefix' => 'topic'], function () {
    Route::get('/','TopicController@getIndex');
    Route::get('add','TopicController@getAdd');
    Route::post('add','TopicController@postAdd');
    Route::get('detail/{id}','TopicController@getDetail');
    Route::post('detail', 'TopicController@postDetail');
    Route::get('delete/{id}', 'TopicController@getDelete');
});

Route::group(['prefix' => 'chats'], function () {
    Route::get('/','ChatsController@getIndex');
    Route::get('add','ChatsController@getAdd');
    Route::post('add','ChatsController@postAdd');
    Route::get('detail/{id}','ChatsController@getDetail');
    Route::post('detail', 'ChatsController@postDetail');
    Route::get('delete/{id}', 'ChatsController@getDelete');
});

Route::group(['prefix' => 'chat'], function () {
    Route::get('/', 'ChatController@getIndex');
    Route::post('/', 'ChatController@postIndex');
    Route::get('list', 'ChatController@getList');
    Route::post('login', 'ChatController@postLogin');
    Route::post('avatar', 'ChatController@postAvatar');
});