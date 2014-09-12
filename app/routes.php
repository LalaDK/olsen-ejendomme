<?php

Route::get('/', function(){
	return View::make('sessions.create');
});

Route::resource('sessions','SessionsController');

Route::resource('users','UserController');

Route::get('login','SessionsController@create');

Route::get('logout','SessionsController@destroy'); 

Route::get('dashboard', function(){
	return View::make('dasboard.index');
});


Route::get('dashboard', [
	'as' => 'admin.dashboard',
	'uses' => 'AdminController@dashboard',
	'before' => 'auth',
]);

Route::get('tenants', [
	'as' => 'tenant.index',
	'uses' => 'TenantController@index',
	'before' => 'auth',
]);
