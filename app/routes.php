<?php

Route::get('/', function(){
	return View::make('sessions.create');
});

Route::resource('sessions','SessionsController');

Route::resource('companies','CompanyController');

Route::resource('users','UserController');

Route::resource('realestates','RealestateController');


Route::get('login','SessionsController@create');

Route::get('logout','SessionsController@destroy'); 

Route::get('dashboard', [
	'as' => 'company.dashboard',
	'uses' => 'CompanyController@dashboard',
	'before' => 'auth',
]);

Route::get('tenants', [
	'as' => 'tenant.index',
	'uses' => 'TenantController@index',
	'before' => 'auth',
]);
