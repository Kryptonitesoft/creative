<?php

Route::model('files', 'App\Models\Fileentry');

Route::bind('files', function($value, $route){
	return App\Models\Fileentry::whereFilename($value)->first();
});


//Auth
Route::controllers([
    'auth' => 'Auth\AuthController',
    'password' => 'Auth\PasswordController',
]);


//Admin
Route::get('admin', [
	'uses'	=> 'AdminController@admin',
	'as'	=> 'admin',
	'middleware' => 'admin'
]);

Route::get('upload', [
	'uses'	=> 'AdminController@filemanager',
	'as'	=> 'upload',
	'middleware' => 'admin'

]);

// Page routes
Route::get('/', 'PageController@index');
Route::get('gallery', 'PageController@gallery');
Route::get('docs', 'PageController@docs');
Route::get('results', 'PageController@results');
Route::get('About', 'PageController@about');
Route::post('contact', 'PageController@contact');

/**
 * File resource route
 */

Route::resource('files', 'FileEntryController');


/**
 * exam resource route
 */

Route::resource('exam', 'ExamController');


/**
 * blog resource route
 */

Route::resource('blog', 'BlogController');
Route::get('blog/search', 'BlogController@search' );


