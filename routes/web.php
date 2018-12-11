<?php


Route::get('/', function () {
    return view('welcome');
});
//to test adding and accepted friend
Route::get('/add',function(){
    return \App\User::first(1)->add_friend(2);
});
Route::get('/accept',function(){
    return \App\User::find(2)->accept_friend(1);
});
//get all user's friend
Route::get('/friends',function(){
    return \App\User::find(1)->friends();
});
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
});
