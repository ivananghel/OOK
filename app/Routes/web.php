<?php

Route::auth();
Route::group(['middleware' => 'web'], function() {
	Route::get('redirect', 		'SocialAuthController@redirect');
	Route::get('callback', 		'SocialAuthController@callback');
	Route::get('registration', 	'Auth\AuthController@registration');
	Route::post('create', 		'Auth\AuthController@store');
});

Route::group(['middleware' => 'auth'], function() {
	Route::get('/', 'HomeController@index');

	Route::group(['middleware' => ['role:user']], function() {
		Route::get('/post '		    	, 'PostController@post');
		Route::post('/islike '		   	, 'PostController@postLikePost');
		Route::get('/attach_link/{id}'		 ,'PostController@attachLink');
		Route::post('/update_link/{id} '		   	, 'PostController@updateLink');

	});
	Route::group(['middleware' => ['role:admin']], function() {
		Route::post('/users/datatable'	, 'UserController@datatable');
		Route::resource('/users'		, 'UserController', ['except' => ['show']]);
	});

});
