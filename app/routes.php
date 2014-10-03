<?php

Route::get('/', function(){
	return View::make('sessions.create');
});

Route::resource('sessions','SessionsController');

Route::resource('companies','CompanyController', ['only'=> ['index','create','store','destroy']]);
Route::resource('users','UserController');

Route::resource('realestates','RealestateController', ['only'=> ['index','create','store','destroy']]);


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

Route::get('companies/deleteindex', [
	'as' => 'company.deleteindex',
	'uses' => 'CompanyController@deleteindex',
	'before' => 'auth',
]);

Route::get('realestates/deleteindex', [
	'as' => 'realestate.deleteindex',
	'uses' => 'RealestateController@deleteindex',
	'before' => 'auth',
]);