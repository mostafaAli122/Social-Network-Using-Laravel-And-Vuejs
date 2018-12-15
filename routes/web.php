<?php


Route::get('/', function () {
    return view('welcome');
});

#region check Friendable trait methods
//to test adding and accepted friend
Route::get('/add_friend',function(){
    return \App\User::first(1)->add_friend(2);
});
Route::get('/accept_friend',function(){
    return \App\User::find(2)->accept_friend(1);
});
//get all user's friend
Route::get('/friends',function(){
    return \App\User::find(1)->friends();
});
//get pending friends
Route::get('/pending_friends',function(){
    return \App\User::find(2)->pending_friend_requests();
});
//get friends ids
Route::get('/friends_ids',function(){
    return \App\User::find(1)->friends_ids();
});
//to check if user is friend 
Route::get('/is_friends_with',function(){
    return \App\User::find(1)->its_friends_with(2);
});
#endregion



Auth::routes();

Route::get('/home', 'HomeController@index');
Route::group(['middleware'=>'auth'],function(){
    Route::get('/profile/{slug}',[
        'uses'=> 'ProfilesController@index',
        'as' => 'profile'
    ]);
    Route::get('/profile/edit/profile',[
        'uses'=> 'ProfilesController@edit',
        'as' => 'profile.edit'
    ]);
    Route::post('/profile/update/profile',[
        'uses'=> 'ProfilesController@update',
        'as' => 'profile.update'
    ]);
    Route::get('/check_relationship_status/{id}',[
        'uses' => 'FriendshipsController@check',
        'as' => 'check'
    ]);
    Route::get('/add_friend/{id}',[
        'uses' => 'FriendshipsController@add_friend',
        'as' => 'add_friend'
    ]);
    Route::get('/accept_friend/{id}',[
        'uses' => 'FriendshipsController@accept_friend',
        'as' => 'accept_friend'
    ]);
    Route::get('get_unread',function(){
        return Auth::user()->unreadNotification;
    });
    Route::get('/notifications',[
        'uses' => 'HomeController@notifications',
        'as' => 'notifications'
    ]);
});
