<?php

Route::get('/', function(){
	return View::make('sessions.create');
});

Route::resource('sessions','SessionsController');

Route::resource('users','UserController');

Route::get('login','SessionsController@create');

Route::get('logout','SessionsController@destroy'); 

