<?php

//Model binding
Route::model('files', 'App\Models\Fileentry');
Route::model('exams', 'App\Models\Exam');
Route::model('results', 'App\Models\Result');
Route::model('blog', 'App\Models\Post');
Route::model('comments', 'App\Models\Comment');

Route::bind('files', function($value, $route){
	return App\Models\Fileentry::whereFilename($value)->first();
});

Route::bind('exams', function($value, $route){
	return App\Models\Exam::whereId($value)->first();
});

Route::bind('results', function($value, $route){
	return App\Models\Result::whereId($value)->first();
});

Route::bind('posts', function($value, $route){
	return App\Models\Post::whereId($value)->first();
});


Route::bind('comments', function($value, $route){
    return App\Models\Comment::whereId($value)->first();
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

Route::resource('exams', 'ExamsController');
Route::resource('exams.results', 'ResultsController');



/**
 * blog resource route
 */

Route::resource('posts', 'PostsController');
Route::resource('posts.comments', 'CommentsController');
Route::get('blog/search', 'BlogController@search' );


