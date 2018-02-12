<?php


Route::group(['middleware' => ['guest']], function(){

    Route::get('/signup', [
        'uses' => 'AuthController@getSignup',
        'as' => 'auth.signup',
    ]);
    Route::post('/signup', [
        'uses' => 'AuthController@postSignup',

    ]);
    Route::get('/signin', [
        'uses' => 'AuthController@getSignin',
        'as' => 'auth.signin',
    ]);
    Route::post('/signin', [
        'uses' => 'AuthController@postSignin',

    ]);



});

Route::group(['middleware' => ['auth']], function() {
    Route::get('/', [
        'uses' => 'HomeController@index',
        'as' => 'home',
    ]);
    Route::get('/signout', [
        'uses' => 'AuthController@getSignout',
        'as' => 'auth.signout',
    ]);

    Route::get('/search/', [
        'uses' => 'SearchController@getIndex',
        'as' => 'search.index',

    ]);
    Route::get('/profile/{username}', [
        'uses' => 'ProfileController@getProfile',
        'as' => 'profile.index',

    ]);
    Route::get('/profile/{id}/edit', [
        'uses' => 'ProfileController@getEdit',
        'as' => 'profile.edit',

    ]);
    Route::post('/profile/{id}/edit', [
        'uses' => 'ProfileController@postEdit',
    ]);
    Route::get('/friends', [
        'uses' => 'FriendController@getFriends',
        'as' => 'friends.index',

    ]);

    Route::get('/friends/add/{username}', [
        'uses' => 'FriendController@getAdd',
        'as' => 'friends.add',
    ]);

    Route::get('/friends/accept/{username}', [
        'uses' => 'FriendController@getAccept',
        'as' => 'friends.accept',
    ]);
    Route::post('/status', [
        'uses' => 'StatusController@postStatus',
        'as' => 'status.post',
    ]);

    Route::post('/status/{statusId}/reply', [
        'uses' => 'StatusController@postReply',
        'as' => 'status.reply',
    ]);
    Route::post('/profile/delete/{username}', [
        'uses' => 'ProfileController@postDelete',
        'as' => 'profile.delete',
    ]);

    Route::get('/status/{statusId}/like', [
        'uses' => 'StatusController@getLike',
        'as' => 'status.like',
    ]);
});




