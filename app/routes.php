<?php

Route::get('/', function(){
	return View::make('sessions.create');
});

Route::resource('sessions','SessionsController');

Route::resource('companies','CompanyController', ['only'=> ['index','create','store','destroy']]);

Route::resource('realestates','RealestateController', ['only'=> ['index','create','store','destroy']]);
Route::resource('tenants','TenantController', ['only'=> ['index','store','destroy']]);

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

Route::get('tenants/{var?}', [
	'as' => 'tenant.create',
	'uses' => 'TenantController@create',
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

/* User routes */


Route::get('users/create', [
	'as' => 'users.create',
	'uses' => 'UserController@createUser',
	'before' => 'auth',
]);


Route::get('users/show', [
	'as' => 'users.show',
	'uses' => 'UserController@showUser',
	'before' => 'auth',
]);

Route::get('users/resetPassword', [
	'as' => 'users.resetPassword',
	'uses' => 'UserController@resetUserPassword',
	'before' => 'auth',
]);

Route::get('users/delete', [
	'as' => 'users.delete',
	'uses' => 'UserController@deleteUser',
	'before' => 'auth',
]);

Route::put('users/store', [
	'as' => 'users.store',
	'uses' => 'UserController@store',
	'before' => 'auth',
]);

Route::post('/users/update/{id}', [
	'as' => 'users.update',
	'uses' => 'UserController@update',
	'before' => 'auth',
]);

Route::delete('users/delete/destroy/{id}', [
	'as' => 'users.destroy',
	'uses' => 'UserController@destroy',
	'before' => 'auth',
]);

