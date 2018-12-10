<?php


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::group(['middleware'=>'auth'],function(){
    Route::get('/profile/{slug}',[
        'uses'=> 'ProfilesController@index',
        'as' => 'profile'
    ]);
});
